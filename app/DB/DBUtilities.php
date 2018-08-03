<?php

namespace App\DB;

class DBUtilities
{
    /**
     * @brief get sql query single value
     */
    public static function dbSQLVal($db, $sql, $echo = false)
    {
        if ($echo) {
            echo "<p>" . $sql;
        }

        $results = $db->query($sql);
        if ($results === false) {
            return false;
        }

        if ($results->num_rows == 0) {
            return false;
        }

        $row = $results->fetch_array();
        if ($row === false) {
            return false;
        }

        return $row[0];
    }

    /**
     * @brief get sql query row
     */
    public static function dbSQLRow($db, $sql, $echo = false)
    {
        if ($echo) {
            echo "<p>" . $sql;
        }

        $results = $db->query($sql);
        if ($results === false) {
            return false;
        }

        if ($results->num_rows == 0) {
            return false;
        }

        $row = $results->fetch_assoc();
        if ($row === false) {
            return false;
        }

        return (object)$row;
    }

    /**
     * @brief get sql query row
     */
    public static function dbSQLRows($db, $sql, $echo = false)
    {
        if ($echo) {
            echo "<p>" . $sql;
        }

        $results = $db->query($sql);
        if ($results === false) {
            return false;
        }

        if ($results->num_rows == 0) {
            return false;
        }

        $all = array();
        while ($row = $results->fetch_assoc()) {
            $all[] = (object)$row;
        }

        return $all;
    }

    /**
     * @brief get sql query associative values
     */
    public static function dbSQLAssociative($db, $sql, $echo = false)
    {
        if ($echo) {
            echo "<p>" . $sql;
        }

        $results = $db->query($sql);
        if ($results === false || $results->num_rows == 0) {
            return false;
        }

        $all = array();
        while ($row = $results->fetch_array()) {
            $all[$row[0]] = $row[1];
        }

        return $all;
    }

    /**
     * @brief get sql query array values
     */
    public static function dbSQLArray($db, $sql, $echo = false)
    {
        if ($echo) {
            echo "<p>" . $sql;
        }

        $results = $db->query($sql);
        if ($results === false || $results->num_rows == 0) {
            return false;
        }

        $all = array();
        while ($row = $results->fetch_array()) {
            $all[] = $row[0];
        }

        return $all;
    }

}