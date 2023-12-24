-- Create the database
CREATE DATABASE IF NOT EXISTS personality_traits_db;

USE personality_traits_db;

-- Create table for student marks
CREATE TABLE IF NOT EXISTS student_marks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    subject1 INT NOT NULL,
    subject2 INT NOT NULL,
    subject3 INT NOT NULL
);

-- Create table for grades with marks range
CREATE TABLE IF NOT EXISTS grades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    grade VARCHAR(2) NOT NULL,
    min_mark FLOAT NOT NULL,
    max_mark FLOAT NOT NULL
);

-- Create table for personality traits with grade range
CREATE TABLE IF NOT EXISTS personality_traits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    trait VARCHAR(100) NOT NULL,
    min_grade VARCHAR(2) NOT NULL,
    max_grade VARCHAR(2) NOT NULL
);

-- Insert sample data into student_marks table
INSERT INTO student_marks (name, subject1, subject2, subject3) VALUES
('Akash', 80, 75, 90),
('Alice', 70, 85, 80),
('Smith', 90, 92, 88);

-- Insert sample data into grades table
INSERT INTO grades (grade, min_mark, max_mark) VALUES
('A', 80, 100),
('B', 70, 79),
('C', 60, 69),
('D', 50, 59),
('F', 0, 49);

-- Insert sample data into personality_traits table
INSERT INTO personality_traits (trait, min_grade, max_grade) VALUES
('Leadership qualities', 'A', 'A'),
('Good communication skills', 'B', 'B'),
('Team player', 'C', 'C'),
('Adaptability', 'D', 'D'),
('Resilience', 'F', 'F');
