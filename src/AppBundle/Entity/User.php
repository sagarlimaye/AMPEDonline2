<?php

namespace AppBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * User
 */
class User extends BaseUser
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var int
     */
    private $sessionCount;
    /**
     * @var string
     */
    private $firstName = 'S';

    /**
     * @var string
     */
    private $lastName = 'J';

    /**
     * @var \DateTime
     */
    private $dob;

    /**
     * @var string
     */
    private $institution='UH';

    /**
     * @var \DateTime
     */
    private $joinDate;
   
    private $mentor;
//    private $students;
    
//    private $sessions;
    
    private $logins;
    private $sessionCreations;
    public function __toString() {
        return $this->getName();
    }
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function __construct() {
//        $this->students = new ArrayCollection();
        $this->sessions = new ArrayCollection();
        $this->logins = new ArrayCollection();
        $this->joinDate = new \DateTime(null, new \DateTimeZone('America/Chicago'));
        $this->dob = new \DateTime(null, new \DateTimeZone('America/Chicago'));
        $this->plainPassword = $this->generatePassword(9);
        
        parent::__construct();
    }
    
    function generatePassword($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }

    return $result;
    }
            
    /**
     * Get all logins
     *
     * @return int
     */
    public function getLogins()
    {
        return $this->logins;
    }
    
//        /**
//     * Get session of this mentee
//     *
//     * @return User
//     */
//    public function getSessions()
//    {
//        return $this->sessions;
//    }
// 
//    /**
//     * Set session of this mentee
//     *
//     * @param int $mentor
//     *
//     * @return User
//     */
//    public function setSessions($sessions)
//    {
//        $this->sessions = $sessions;
//        
//        return $this;
//    }

    public function addSession($session)
    {
        $this->sessions->add($session);
    }
    public function removeSession($session)
    {
        $this->sessions->removeElement($session);
    }

//    /**
//     * Remove student
//     *
//     * @return User
//     */
//    public function removeStudent($student)
//    {
//        $this->students->removeElement($student);
//        $student->setMentor(null);
//    }
// 
//    /**
//     * Add a student
//     *
//     * @param User $students
//     *
//     * @return User
//     */
//    public function addStudent($student)
//    {
//        $this->students->add($student);
//        $student->setMentor($this);
//    }
//
//    /**
//     * Get students
//     *
//     * @return ArrayCollection
//     */
//    public function getStudents()
//    {
//        return $this->students;
//    }
// 
//    /**
//     * Set students
//     *
//     * @param ArrayCollection $students
//     *
//     * @return User
//     */
//    public function setStudents($students)
//    {
//        $this->students = $students;
//        
//        return $this;
//    }    
    
    /**
     * Get Mentor
     *
     * @return User
     */
    public function getMentor()
    {
        return $this->mentor;
    }
 
    /**
     * Set mentor
     *
     * @param User $mentor
     *
     * @return User
     */
    public function setMentor($mentor)
    {
        $this->mentor = $mentor;
        
        return $this;
    }
   
    
    /**
     * Set sessionCreations
     */
    public function setSessionCreations($sessionCreations)
    {
        $this->sessionCreations = $sessionCreations;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getSessionCreations()
    {
        return $this->sessionCreations;
    }
      
    
    
    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    
    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    public function getName()
    {
        return $this->firstName.' '.$this->lastName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set dob
     *
     * @param \DateTime $dob
     *
     * @return User
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get dob
     *
     * @return \DateTime
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set institution
     *
     * @param string $institution
     *
     * @return User
     */
    public function setInstitution($institution)
    {
        $this->institution = $institution;

        return $this;
    }

    /**
     * Get institution
     *
     * @return string
     */
    public function getInstitution()
    {
        return $this->institution;
    }

    /**
     * Set joinDate
     *
     * @param \DateTime $joinDate
     *
     * @return User
     */
    public function setJoinDate($joinDate)
    {
        $this->joinDate = $joinDate;

        return $this;
    }

    /**
     * Get joinDate
     *
     * @return \DateTime
     */
    public function getJoinDate()
    {
        return $this->joinDate;
    }
}
