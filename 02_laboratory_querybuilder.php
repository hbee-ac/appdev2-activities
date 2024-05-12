<?php

# Task#1 Retrieve all students
# SQL syntax: SELECT * FROM students;
DB::table('students')
  ->get();

# Task#2 Retrieve students in a specific grade
# SQL syntax: SELECT * FROM students WHERE grade = '10';
DB::table('students')
  ->where('grade', '10')
  ->get();

# Task#3 Retrieve students with a specific age range.
# SQL syntax: SELECT * FROM students WHERE age BETWEEN 15 AND 18;
DB::table('students')
  ->whereBetween('age', [15, 18])
  ->get();

# Task#4 Retrieve students from a specific city.
# SQL syntax: SELECT * FROM students WHERE city = 'Manila';
DB::table('students')
  ->where('city', 'Manila')
  ->get();

# Task#5 Retrieve students sorted by their age in descending order.
# SQL syntax: SELECT * FROM students ORDER BY age DESC;
DB::table('students')
  ->orderBy('age', 'desc')
  ->get();

# Task#6 Retrieve students with their corresponding teacher.
# SQL syntax: SELECT students.*, teachers.name AS teacher_name 
# FROM students 
# LEFT JOIN teachers ON students.teacher_id = teachers.id;
DB::table('students')
  ->select('students.*', 'teachers.name as teacher_name')
  ->leftJoin('teachers', 'students.teacher_id', '=', 'teachers.id')
  ->get();

# Task#7 Retrieve teachers along with the number of students they teach.
# SQL syntax: SELECT teachers.*, COUNT(students.id) AS student_count 
# FROM teachers 
# LEFT JOIN students ON teachers.id = students.teacher_id 
# GROUP BY teachers.id;
DB::table('teachers')
  ->selectRaw('teachers.*, count(students.id) as student_count')
  ->leftJoin('students', 'teachers.id', '=', 'students.teacher_id')
  ->groupBy('teachers.id')
  ->get();

# Task#8 Retrieve students with their corresponding subjects.
# SQL syntax: SELECT students.*, subjects.name AS subject_name 
# FROM students 
# INNER JOIN subjects ON students.subject_id = subjects.id;
DB::table('students')
  ->select('students.*', 'subjects.name as subject_name')
  ->join('subjects', 'students.subject_id', '=', 'subjects.id')
  ->get();

# Task#9 Retrieve students along with their average scores.
# SQL syntax: SELECT students.*, AVG(scores.score) AS average_score 
# FROM students 
# LEFT JOIN scores ON students.id = scores.student_id 
# GROUP BY students.id;
DB::table('students')
  ->selectRaw('students.*, avg(scores.score) as average_score')
  ->leftJoin('scores', 'students.id', '=', 'scores.student_id')
  ->groupBy('students.id')
  ->get();

# Task#10 Retrieve top 5 teachers with the highest number of students.
# SQL syntax: SELECT teachers.*, COUNT(students.id) AS student_count 
# FROM teachers 
# LEFT JOIN students ON teachers.id = students.teacher_id 
# GROUP BY teachers.id 
# ORDER BY student_count DESC 
# LIMIT 5;
DB::table('teachers')
  ->selectRaw('teachers.*, count(students.id) as student_count')
  ->leftJoin('students', 'teachers.id', '=', 'students.teacher_id')
  ->groupBy('teachers.id')
  ->orderBy('student_count', 'desc')
  ->limit(5)
  ->get();