<?php
    require_once './classes/db.class.php';

    class Login extends DB {
        public function loginUser ($email, $userPassword) {
            $data = [
                'email' => $email,
            ];
            $sql = "SELECT * from user where email = :email";

            $statmemt = $this->pdo->prepare($sql);
            if ($statmemt->execute($data)) {
                $user = $statmemt->fetch();
                if ($user) {
                    if($user['password'] === $userPassword) {
                        // print_r()
                        if ($user['isAdmin'] == '1') {
                            return [
                                'admin' => true,
                                'status' => true,
                            ];
                        } else {
                            return [
                                'status' => true,
                                'msg' => 'Tacna sifra',
                                'user' => $user
                            ];
                        }
                    } else {
                        return [
                            'status' => false,
                            'msg' => 'Lozinka nije tacna.'
                        ];
                    }
                } else {
                    return [
                        'status' => false,
                        'msg' => 'Korisnicki racun sa navedenom email adresom nije pronadjen.'
                    ];
                }
            } 
        }
        
    }
?>