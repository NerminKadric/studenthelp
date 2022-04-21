<?php

use function PHPSTORM_META\type;

    require_once './classes/db.class.php';
    class Dashboard extends DB {
        public function getUserUsingEmail($email) {
            $dataForSelect = [
                'email' => $email
            ];
            $sqlForSelect = "SELECT * from user where email = :email";
            $statmemtForSelect = $this->pdo->prepare($sqlForSelect);
            if($statmemtForSelect->execute($dataForSelect)) {
                $user = $statmemtForSelect->fetch();
                return $user;
            }
        }

        public function reportProblem($type, $desc, $userId) {
            switch($type) {
                case 1:
                    $type = 'Incident u prostorijama IPI Akademije';
                    break;
                case 2:
                    $type = 'Problem sa profesorom';
                    break;
                case 3:
                    $type = 'Problem sa dokumentacijom';
                    break;
            }
            $dataToBind = [
                'type' => $type,
                'description' => $desc,
                'user_id' => $userId,
            ];
            $sqlToSend = "INSERT INTO problem_report(type, description, user_id) values (:type, :description, :user_id)";
            $statmentToInsert = $this->pdo->prepare($sqlToSend);
            if($statmentToInsert->execute($dataToBind)) {
                return true;
            } else {
                return false;
            }
        }

        public function getProblemReports() {
            $selectAllReports = "SELECT * FROM problem_report INNER JOIN user on problem_report.user_id = user.id";
            $stmnt = $this->pdo->prepare(($selectAllReports));
            if($stmnt->execute()) {
                $report = $stmnt->fetchAll();
                return $report;
            }
        }
        
        public function getAnsweredProblems ($email) {
            $dataToBind = [
                'email' => $email
            ];
            $selectAnswered = 'SELECT * from answered_reports where email = :email';
            $statmet = $this->pdo->prepare($selectAnswered);
            if($statmet->execute($dataToBind)) {
                $answeredStatment = $statmet->fetchAll();
                return $answeredStatment;
            }
        }
        public function setAnnouncement($text) {
            $deleteFromAnnouncement = 'DELETE FROM last_announcement';
            $deleteStmtm = $this->pdo->prepare($deleteFromAnnouncement);
            if($deleteStmtm) {
                $dataToBIND = [
                    'text' => $text
                ];
                $insert = 'INSERT INTO last_announcement(text) values(:text)';
                $stmt = $this->pdo->prepare($insert);
                if($stmt->execute($dataToBIND)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        public function getAnnouncement() {
            $sql = 'SELECT * FROM last_announcement';
            $stmt = $this->pdo->prepare($sql);
            if($stmt->execute()) {
                $announcement = $stmt->fetchAll();
                return $announcement[count($announcement)-1];
            }
        }
        public function answerProblem($email, $text, $id) {
            $deleteDataToBind = [
                'id' => $id
            ];
            $deleteReport = 'DELETE from problem_report where id = :id';

            $deleteStmt = $this->pdo->prepare(($deleteReport));
            if($deleteStmt->execute($deleteDataToBind)) {
                $dataToBind = [
                    'email' => $email,
                    'text' => $text
                ];
                $query = 'INSERT INTO answered_reports(email, text) values (:email, :text)';
                $stmt = $this->pdo->prepare(($query));
                if($stmt->execute($dataToBind)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        public function deleteAnswer($id) {
            $dataToBind = [
                'id'=> $id
            ];
            $sql = 'DELETE FROM answered_reports WHERE id = :id';
            $stmt = $this->pdo->prepare($sql);
            if($stmt->execute($dataToBind)){
                return true;
            } else {
                return false;
            }
        }
    }