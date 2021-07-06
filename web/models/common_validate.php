<?php
    class CommonValidate
    {
        function winUser($user)
        {
            $getshell = Shell_Exec ("wmic useraccount get name");

            $getshell = preg_replace('/\s+/', '',explode("\n",explode('\n',$getshell)[0]));
            if(in_array($user,$getshell))
            {
                return true;
            }
            return false;
        }

        function checkInDb($query)
        {
            $stmt1 = $this->pdo->prepare($query);
			$stmt1->execute();
			$data = $stmt1->fetch(PDO::FETCH_ASSOC);
			return $data;
        }
    }
?>