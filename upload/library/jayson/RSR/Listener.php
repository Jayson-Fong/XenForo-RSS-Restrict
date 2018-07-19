<?php
class jayson_RSR_Listener {
	public static function Listen($class, array &$extend) {
		$extend[] = 'jayson_RSR_Extend_'.$class;
	}
}