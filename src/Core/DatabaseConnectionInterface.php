<?php
namespace Core;

interface DatabaseConnectionInterface {
    /** @return \mysqli */
    public function getConnection();
}
