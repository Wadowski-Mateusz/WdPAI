<?php

class Grade {
    private int $studentId;
    private int $subjectId;
    private float $grade;
    private string $dateOfIssue;

    public function __construct(int $studentId, int $subjectId, float $grade, string $dateOfIssue) {
        $this->studentId = $studentId;
        $this->subjectId = $subjectId;
        $this->grade = $grade;
        $this->dateOfIssue = $dateOfIssue;
    }

    public function getStudentId(): int {
        return $this->studentId;
    }

    public function getSubjectId(): int {
        return $this->subjectId;
    }

    public function getGrade(): float {
        return $this->grade;
    }

    public function getDateOfIssue(): string {
        return $this->dateOfIssue;
    }


}