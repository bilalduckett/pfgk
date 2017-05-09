<?php

	class Twig_Extension_Asset extends Twig_Extension {

		public function getFunctions() {
			return [
				new Twig_SimpleFunction('asset', 'asset', ['needs_environment' => FALSE]),
			];
		}

		public function getName() {
			return 'asset';
		}

	}
