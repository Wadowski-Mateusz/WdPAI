<?php

    class Subject {
        private int $classId;
        private int $teacherId;
        private string $name;

        public function __construct(int $classId, int $teacherId, string $name)
        {
            $this->classId = $classId;
            $this->teacherId = $teacherId;
            $this->name = $name;
        }

        public function getClassId(): int {
            return $this->classId;
        }

        public function getTeacherId(): int {
            return $this->teacherId;
        }

        public function getName(): string {
            return $this->name;
        }

    }