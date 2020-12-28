<?php
    class clsCoreView {
        public function __construct() {

        }

        protected function tableView($result, $idName, $excludeColumns=array(), $columnNames=array()) {
            $output = "";
            $output .= "<div class='table-responsive'>";
                $output .= "<table class='table'>";
                    $output .= "<thead>";
                        $output .= "<tr>";
                            for($i = 0; $i < 1; $i++ ) {
                                foreach($result[0] as $index => $value) {
                                    if(!in_array($index,$excludeColumns)) {
                                        if(isset($columnNames[$index])) {
                                            $index = $columnNames[$index];
                                        }
                                        $output .= "<td>" . $index . "</td>";
                                    }
                                }
                                $output .= "<td></td>";
                                $output .= "<td></td>";
                                $output .= "<td></td>";
                            }
                        $output .= "</tr>";
                    $output .= "</thead>";

                    $output .= "<tbody>";
                        foreach($result as $key => $row) {
                            $output .= "<tr>";
                                foreach($row as $index => $value) {
                                    if(!in_array($index,$excludeColumns)) {
                                        $output .= "<td>" . $value . "</td>";
                                    }
                                }
                                $output .= "<td>
                                                <a href='".THISPAGE."?".$idName."=".$row[$idName]."&action=detail'>
                                                        <img src='".BOOTSTRAPICONS_PATH."clipboard.svg' />
                                                </a>    
                                            </td>";
                                $output .= "<td>
                                                <a href='".THISPAGE."?".$idName."=".$row[$idName]."&action=edit'>
                                                    <img src='".BOOTSTRAPICONS_PATH."pencil.svg' />
                                                </a>
                                            </td>";
                                $output .= "<td>
                                                <a href='".THISPAGE."?".$idName."=".$row[$idName]."&action=delete'>
                                                    <img src='".BOOTSTRAPICONS_PATH."trash.svg' />
                                                </a>
                                            </td>";
                            $output .= "</tr>";
                        }    
                    $output .= "</tbody>";
                            
                $output .= "</table>";
            $output .= "</div>";
                            
			return $output;
        }
    } //end class