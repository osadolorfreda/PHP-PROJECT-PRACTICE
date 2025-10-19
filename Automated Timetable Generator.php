<?php
$courses = [
    'GEDS317' => 'Fundamental of Christian Faith',
    'IFT 301'=> 'PHP',
    'IFT 323'=>'database design and programming',
    'IFT 321'=>'Mobile Application Development',
    'ICT 305'=>'Data Communication and Networking',
    'COSC 325'=>'Machine  Learning and Python',
    'COSC 309'=>'Artificial Intelligence',
    'IFT 307'=>'Ethnical and legal issues in IT',
    'IFT 315'=>'penetation testing and ethnical hacking',
    
];

// Lecturers
$lecturers = [
    'Dr  Adeoti', // For GEDS 317 or any 
    'Mr Ebenzer Oyenuga',// For PHP
    'Dr Izang Aaron', // For Database Design and Programming
    'Dr Emmanuel Oyerinde', // For Mobile Application 
    'Dr Jeff Akinsola', // For Data Communication and Networking
    'Mr Promise', // For Machine Learning and Python
    'Dr Jerry', // For Artificial intelligence
    'Mr Faluyi' // For Ethnical and legal issues in IT
    'Dr Ogu' // For penetation testing and ethnical hacking
];

// Rooms
$rooms = ['online', 'E202', 'Lecture Hall 1', 'Lecture Hall 2', 'New Horizon Room', 'Ampitheatre'];

// Days and Periods
$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
$periods_per_day = 5;

// Shuffle for some randomization
shuffle($lecturers);
shuffle($rooms);

function generateTimetable($courses, $lecturers, $rooms, $days, $periods_per_day) {
    $timetable = [];
    $course_keys = array_keys($courses);
    $lecturer_count = count($lecturers);
    $room_count = count($rooms);
    $course_count = count($course_keys);

    $index = 0;
    foreach ($days as $day) {
        for ($period = 1; $period <= $periods_per_day; $period++) {
            $course = $course_keys[$index % $course_count];
            $lecturer = $lecturers[$index % $lecturer_count];
            $room = $rooms[$index % $room_count];

            $timetable[$day][$period] = [
                'course' => $courses[$course],
                'code' => $course,
                'lecturer' => $lecturer,
                'room' => $room,
            ];
            $index++;
        }
    }
    return $timetable;
}

// Generate and Display the Timetable
$timetable = generateTimetable($courses, $lecturers, $rooms, $days, $periods_per_day);

echo "<h2>300 Level Information Technology Timetable</h2>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Day</th>";
for ($p = 1; $p <= $periods_per_day; $p++) {
    echo "<th>Period $p</th>";
}
echo "</tr>";
foreach ($days as $day) {
    echo "<tr><td>$day</td>";
    for ($p = 1; $p <= $periods_per_day; $p++) {
        $cell = $timetable[$day][$p];
        echo "<td>
            <b>{$cell['code']}</b>: {$cell['course']}<br>
            <i>{$cell['lecturer']}</i><br>
            <small>{$cell['room']}</small>
        </td>";
    }
    echo "</tr>";
}
echo "</table>";
?>