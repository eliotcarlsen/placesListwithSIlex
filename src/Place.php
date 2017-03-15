<?php
    class Place
    {
        private $location;
        public $time;
        public $activity;

        function __construct($geo, $length, $fun)
        {
            $this->location = $geo;
            $this->time = $length;
            $this->activity = $fun;
        }

        function setLocation($new_location)
        {
            $this->location = $new_location;
        }

        function getLocation()
        {
            return $this->location;
        }

        function setTime($new_time)
        {
            $this->time = $new_time;
        }

        function getTime()
        {
            return $this->time;
        }
        function setActivity($new_activity)
        {
            $this->activity = $new_activity;
        }

        function getActivity()
        {
            return $this->activity;
        }

        function save()
        {
            array_push($_SESSION['places'], $this);
        }
        static function getAll()
        {
            return $_SESSION['places'];
        }

    }
?>
