<?php

class ClassInSchool {
    private int $tutorId = -1;
    private string $name;
    private int $schoolId;

    /**
     * @param $tutorId null or int
     */
    public function __construct(
        $tutorId,
        string $name,
        int $schoolId
    ){
        $this -> name = $name;
        $this -> schoolId = $schoolId;
        $this -> tutorId =  ($tutorId != null) ? $tutorId : -1;
    }

    public function getTutorId(): int {
        return $this->tutorId;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getSchoolId(): int {
        return $this->schoolId;
    }

}