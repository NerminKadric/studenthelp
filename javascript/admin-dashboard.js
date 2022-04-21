
function postAnnouncement() {
    const announcement = document.getElementById('announcement-text');
    document.getElementById('announcement-success').style.display = 'none';
    if(announcement.value.length < 1) {
            document.getElementById('announcement-empty').style.display = 'block';
            return false;
    }
    const data = {
        text: announcement.value
    }

    makeRequest('POST', 'announcement.php', JSON.stringify(data)).then(response => {
        let parsedResponse = JSON.parse(response);
        if(parsedResponse.success === false) {
            document.getElementById('announcement-error').style.display = 'block';
            window.scroll(0,findPos(document.getElementById("answer-error")));
            return false;
        } else {
            document.getElementById('announcement-error').style.display = 'none';
            document.getElementById('announcement-empty').style.display = 'none';
            document.getElementById('announcement-success').style.display = 'block';
            announcement.value = '';
        }
    })
}
function sendBack(email, id) {
    const backText = document.getElementById(id);

    if(backText.value.length < 1) {
        document.getElementById('answer-empty').style.display = 'block';
        window.scroll(0,findPos(document.getElementById("answer-empty")));
        return false;
    }

    const data = {
        email: email,
        backText: backText.value,
        id: id
    }


    makeRequest('POST', 'answer-report.php', JSON.stringify(data)).then(response => {
        let parsedResponse = JSON.parse(response);
        if(parsedResponse.success === false) {
            document.getElementById('answer-error').style.display = 'block';
            window.scroll(0,findPos(document.getElementById("answer-error")));
            return false;
        } else {
            document.getElementById('answer-error').style.display = 'none';
            document.getElementById('answer-empty').style.display = 'none';
            document.getElementById(id).closest('tr').remove();
        }
    });

}
function makeRequest (method, url, data) {
    return new Promise(function (resolve, reject) {
      var xhr = new XMLHttpRequest();
      xhr.open(method, url);
      xhr.onload = function () {
        if (this.status >= 200 && this.status < 300) {
          resolve(xhr.response);
        } else {
          reject({
            status: this.status,
            statusText: xhr.statusText
          });
        }
      };
      xhr.onerror = function () {
        reject({
          status: this.status,
          statusText: xhr.statusText
        });
      };
      if(method=="POST" && data){
          xhr.send(data);
      }else{
          xhr.send();
      }
    });
  }  
