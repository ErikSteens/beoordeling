<?php

	/**
	 * submenu class.
	 */
	class submenu {


		/**
		 * getHtml function.
		 *
		 * @access public
		 * @return $output
		 *
		 * Zolang er een bestaande pagina wordt aangeroepen gaat het goed. Anders wordt index weergegeven.
		 * Vul de lijst met case aan met jouw paginanamen.
		 */
		public function getHtml() {
			$page = PAGE;
			switch(PAGE) {
				case "index"			:
				case "pagename 1"		:
				case "pagename 2"		:
				case "pagename 3"		:
				case "pagename 4"		: $output = $this->$page(); break; //voert een function/method met de naam van requested page uit
				default					: $output = $this->index(); //geen keuze, dan index tonen
			}
			return $output;
		}

		protected function index() {
			$output = '
				Dit is de file includes/submenu.inc.php
			';

			$output .= '
				<ul>
					<li><a href="">Menuitem 1</a></li>
					<li><a href="">Menuitem 2</a></li>
				</ul>
			';
			return $output;
		}

		protected function pagename1() {
			$output = '
				<ul>
					<li><a href="">Menuitem 1</a></li>
					<li><a href="">Menuitem 2</a></li>
				</ul>
			';
			return $output;
		}

		protected function pagename2() {
			$output = '
				<ul>
					<li><a href="">Menuitem 1</a></li>
					<li><a href="">Menuitem 2</a></li>
				</ul>
			';
			return $output;
		}

		protected function overzichten() {
			$output = '
				<ul>
					<li><a href="">Menuitem 1</a></li>
					<li><a href="">Menuitem 2</a></li>
				</ul>
			';
			return $output;
		}

		protected function gegevens() {
			$output = '
				<ul>
					<li><a href="">Menuitem 1 in file includes/submenu.inc.php</a></li>
					<li><a href="">Menuitem 2</a></li>
					<li><a href="">Menuitem 3</a></li>
					<li><a href="">Menuitem 4</a></li>
				</ul>
			';
			return $output;
		}
	}