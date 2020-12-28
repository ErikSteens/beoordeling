<?php
	class page extends clsCoreView {
        private $objChallenge;

		public function __construct() {
            require_once(CLASSES_PATH . "clsChallenges.php");
            $this->objChallenge = new Challenges();
		}

		public function getHtml() {
            if(isset($_GET['action'])) {
                $action = $_GET['action'];
                
                if(isset($_GET['uuid'])) {
                    $uuid = $_GET['uuid'];
                }
                
                switch($action) {
                    case "detail"       : return $this->getDetail($uuid); break;
                    case "edit"         : return $this->edit(); break;
                    case "delete"       : return $this->delete(); break;
                    case "new"          : return $this->new(); break;
                    //case "addchallenge" : return $this->addchallenge(); break;
                    case "savechallenge" : return $this->savechallenge(); break;
                    default: return $this->default();
                }
            } else {
                return $this->default();
            }
			return $this->default();
        }
        
        private function default() {
            $output = "<a href='?action=new'><img src='".BOOTSTRAPICONS_PATH."plus-circle.svg' width='20px' /></a><br /><br />"; 
            $list = $this->getList();
            $output .= $this->showList($list); 
            return $output;
        }

		private function getList() {
			$result = $this->objChallenge->getListAll();
			return $result;
        }
        
        private function savechallenge() {
            //echo $_POST['uuid']; die;
            if(isset($_POST['uuid'])) {
                $uuid = $_POST['uuid'];
                if($uuid != -1) {
                    $this->updatechallenge($uuid);
                } else {
                    $this->addchallenge();
                }
            }
        }

        private function updatechallenge($uuid) {
            $this->objChallenge->update($uuid);
        }

        private function getDetail($uuid) {
            $output = "Challenge";
            $result = $this->objChallenge->getDetail($uuid);
            $output .= $this->showList($result);
            $result = $this->objChallenge->getChallengeContentByChallengeUuid($uuid);
            
            $output .= "Opdrachten";
            if(database::getNumrows() > 0) {
                $output .= $this->showChallengeContentList($result);
            } else {
                $output .= "<br />Er is niets om weer te geven.<br />";
            }
			return $output;
        }

        private function edit() {
            if(isset($_GET['uuid'])) {
                $uuid = $_GET['uuid'];
                //print $uuid; die;
                $result = $this->objChallenge->getDetail($uuid);
                return $this->formChallenge($result);
            } else {
                return "Helaas geen juist resultaat.";
            }
        }

        private function delete() {
            if(isset($_GET['uuid'])) {
                $uuid = $_GET['uuid'];
                $this->objChallenge->delete($uuid);
                header("Location: /challenges.php");
            } else {
                return "Helaas geen juist resultaat.";
            }
        }

        private function new() {
            return $this->formChallenge();
        }

		private function showList($List) {
			$excludeColumns = array("uuid", "serialnumber","timestamp", "status");
			$columnNames = array('challengenumber'=>'Challengenummer',
									'serialnumber'=>'Volgnummer',
									'grade'=>'Schooljaar',
                                    'title'=>'Titel',
                                    'description'=>'Beschrijving'
									);
			$output = $this->tableView($List, "uuid", $excludeColumns, $columnNames);
			return $output;
        }
        
        private function showChallengeContentList($List) {
			$excludeColumns = array("uuid", "timestamp", "status");
			$columnNames = array('challengenumber'=>'Challengenummer',
									'serialnumber'=>'Volgnummer',
									'assignment'=>'Opdracht',
                                    'title'=>'Titel',
                                    'description'=>'Beschrijving'
									);
			$output = $this->tableView($List, "uuid", $excludeColumns, $columnNames);
			return $output;
        }
        
        private function addchallenge() {
           require_once(PROCESS_PATH . "addchallenge.php");
           //check of juiste formulier is verstuurd
            if(isset($_POST['frmAddChallenge'])) {
                if($_POST['frmAddChallenge'] == "frmAddChallenge") {
                    $this->objChallenge->insert();
                }
            }
            header("Location: /challenges.php");
        }

        private function formChallenge($result = "") {
            if(is_array($result)) {
                foreach($result[0] as $key => $value) {
                    $$key = $value;
                }
            }
            if(!isset($uuid))               { $uuid = -1; }
            if(!isset($challengenumber))    { $challengenumber = 0; }
            if(!isset($serialnumber))       { $serialnumber = 0; }
            if(!isset($grade))              { $grade = 0; }
            if(!isset($title))              { $title = ""; }
            if(!isset($description))        { $description = ""; }

            $form = "<form action='?action=savechallenge' enctype='multipart/formdata' method='post'>";
                $form .= <<<HTML
                    <label>Challengenummer</label>
                    <input type='number' min='1' max='48' value='$challengenumber' name='challengenumber' />
                    
                    <label>Volgnummer</label>
                    <input type='number' min='1' max='48' value='$serialnumber' name='serialnumber' />

                    <label>Schooljaar</label>
                    <input type='number' min='1' max='4' value='$grade' name='grade' />

                    <label>Titel (max 120)</label>
                    <input type='text' maxlength='120' value='$title' size='100%' name='title' />

                    <label>Beschrijving</label>
                    <textarea name='description' rows='10' cols='100%'>$description</textarea>

                    <label></label>
                    <input type='hidden' value='$uuid' name='uuid' />
                    <input type='hidden' value='frmAddChallenge' name='frmAddChallenge' />
                    <input type='submit' value='Toevoegen' name='btnSubmitFrmAddChallenge' />

HTML; 
            $form .= "</form>";
            return $form;
        }
	}