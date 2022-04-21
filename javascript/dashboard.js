window.onload = function() { 
    document.getElementById("problem_report_form").onsubmit = function() { 
        return validatePorblemReportForm();
    };

};
function validatePorblemReportForm() {
    let desc = document.getElementById('report_problem_desc');
    if(desc.value === '') {
        document.getElementById('desc-alert').style.display = 'block';
        return false;
    } else {
        document.getElementById('desc-alert').style.display = 'none';
    }

}
function deleteResponse(id) {
    const row = document.getElementById(id);
    const data = {
        id: id
    }
    makeRequest('POST', 'delete-answer.php', JSON.stringify(data)).then(response => {
        const parsedResponse = JSON.parse(response);
        if(parsedResponse.success) {
            row.remove();
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