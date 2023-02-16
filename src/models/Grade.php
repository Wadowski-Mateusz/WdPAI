<?php

class Grade {
    private int $studentId;
    private int $subjectId;
    private float $grade;
    private float $weight;
    private string $dateOfIssue;
    private $comment;

    /**
     * @param $comment string or null
     */
    public function __construct(int $studentId, int $subjectId, float $grade, float $weight, string $dateOfIssue, $comment) {
        $this->studentId = $studentId;
        $this->subjectId = $subjectId;
        $this->grade = $grade;
        $this->weight = $weight;
        $this->dateOfIssue = $dateOfIssue;
        $this->comment = $comment;
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

    public function getWeight(): float {
        return $this->weight;
    }

    public function getDateOfIssue(): string {
        return $this->dateOfIssue;
    }

    public function getComment(): string {
        return $this->comment;
    }

}