<?php
/**
 * Created by PhpStorm.
 * User: Bra Emma
 * Date: 8/15/2018
 * Time: 11:09 PM
 */
class DBOperations
{
    private $con;
    public function __construct()
    {
        include_once dirname(__FILE__) . "/DBConnect.php";
        $db = new DBConnect();
        $this->con = $db->connect();
    }
    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    //check if user exists
    function checkUser($email)
    {
        $stmt = $this->con->prepare("select * from users where Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
    //create new user
    function createNewUser($name, $email, $role, $phone, $grpName, $password)
    {
        $stmt = $this->con->prepare("insert into users(Name, Email, Role, Phone, GroupName, Password) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $name, $email, $role, $phone, $grpName, $password);
        $result = $stmt->execute();
        $stmt->close();
        if ($result) {
            $stmt = $this->con->prepare("select * from users where Email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;
        } else {
            return false;
        }
    }
    //login user
    function userLogin($email, $password)
    {
        $stmt = $this->con->prepare("select * from users where Email = ? and  Password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt = $this->con->prepare("select * from users where Email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;
        } else {
            $stmt->close();
            return false;
        }
    }
    //add event
    function addEvent($eventDesc,$eventName,$icon,$grpName)
    {
        $stmt = $this->con->prepare("insert into events (EventDesc, EventName, Icon, GroupName) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $eventDesc, $eventName, $icon, $grpName);
        $results = $stmt->execute();
        $last = $this->con->insert_id;

        if ($results) {
            $stmt = $this->con->prepare("select * from events where id = ?");
            $stmt->bind_param("i", $last);
            $stmt->execute();
            $events = $stmt->get_result()->fetch_assoc() ;
            $stmt->close();
            return $events;
        } else {
            return 0;
        }
    }
    //fetch data from a specified table
    function getAllRecord($table)
    {
        $stmt ="select * from ".$table;
        $results = $this->con->query($stmt);
        $tab = array();
        if (@$results->num_rows > 0) {
            while ($item = $results->fetch_assoc())
                $tab[] = $item;
            return $tab;
        } else {
            return "Invalid Table";
        }
    }
    //get events
    public function getEvents($id)
    {
        $stmt ="select * from events where id ='".$id."'";
        $results = $this->con->query($stmt);
        $tab = array();
        if (@$results->num_rows > 0) {
            while ($item = $results->fetch_assoc())
                $tab[] = $item;
            return $tab;
        } else {
            return "NO_EVENTS";
        }
    }
    //get groups
    public function getGroups($id)
    {
        $stmt ="SELECT * FROM groups where g_id = '$id'";
        $results = $this->con->query($stmt);
        $tab = array();
        if (@$results->num_rows > 0) {
            $row = $results->fetch_assoc();
            $tab[] = $row;
            $sql2 = "select Time, Day, Venue, Latitude, Longitude, g_id  from meetings where g_id = '$id'";
            $res = $this->con->query($sql2);
            $bat = array();

            while ($wes = $res->fetch_assoc() ) {
                $bat[] = $wes;
            }
            return array("Groups" => $tab,"Meetings" => $bat);
        }else {
            return "NO_GROUPS";
        }
    }

    public function tryGroups()
    {
        $stmt ="SELECT * FROM groups";
        $results = $this->con->query($stmt);
        $tab = array();
        if (@$results->num_rows > 0) {
            $row = $results->fetch_assoc();
            $tab[] = $row;
        
            return  $tab;
        }else {
            return "NO_GROUPS";
        }
    }

    //add groups
    public function addGroup($name,$about,$aim,$icon,$vision,$contact)
    {
        $stmt = $this->con->prepare("insert into groups(GroupName, About, Aim, Icon, Vision, Contact) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $name, $about, $aim, $icon, $vision, $contact);
        $results = $stmt->execute();
        if ($results) {
            return "GROUP_ADDED";
        } else {
            return 0;
        }
    }
    //add meeting days
    public function addMeetings($time,$day,$venue,$latitude,$longitude,$id)
    {
        $stmt = $this->con->prepare("insert into meetings(Time, Day, Venue, Latitude, Longitude, g_id) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("sssssi", $time, $day, $venue, $latitude, $longitude, $id);
        $results = $stmt->execute();
        if ($results) {
            return "MEETING_ADDED";
        } else {
            return 0;
        }
    }
    //get meeting days
    public function getMeetings($id)
    {
        $stmt ="select * from meetings where g_id ='".$id."'";
        $results = $this->con->query($stmt);
        $tab = array();
        if (@$results->num_rows > 0) {
            while ($item = $results->fetch_assoc())
                $tab[] = $item;
            return $tab;
        } else {
            return "NO_EVENTS";
        }
    }
    //get announcements
    public function getAnnouncements($id)
    {
        $stmt ="select * from announcements  where g_id ='".$id."'";
        $results = $this->con->query($stmt);
        $tab = array();
        if (@$results->num_rows > 0) {
            while ($item = $results->fetch_assoc())
                $tab[] = $item;
            return $tab;
        } else {
            return "NO_ANNOUNCEMENTS";
        }
    }
    //add Announcements
    public function addAnnouncements($desc,$name,$title,$icon,$id)
    {
        $stmt = $this->con->prepare("insert into announcements (Description, GroupName, Title, Icon, g_id) VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssssi", $desc,$name,$title,$icon,$id);
        $results = $stmt->execute();
        if ($results) {
            return "ANNOUNCEMENT_ADDED";
        } else {
            return 0;
        }
    }
    //subscribe to group
    public function subscribe($token, $groupID)
    {
        $stmt = $this->con->prepare("insert into subscribers (device_token, g_id) VALUES (?,?)");
        $stmt->bind_param("si", $token,$groupID);
        $results = $stmt->execute();
        if ($results) {
            return "SUBSCRIBER_ADDED";
        } else {
            return 0;
        }
    }
    //get list of all subscribers
    public function getSubscribers($token, $groupID)
    {
        $stmt ="select * from subscribers where device_token ='$token' and g_id = '$groupID'";
        $results = $this->con->query($stmt);
        $tab = array();
        if (@$results->num_rows > 0) {
            while ($item = $results->fetch_assoc())
                $tab[] = $item;
            return $tab;
        } else {
            return "NO_SUBSCRIBERS";
        }
    }



}