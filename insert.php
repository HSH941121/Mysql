<?php
  $conn = mysqli_connect("localhost:3307","hsh123","1234","opentutorials");
  echo mysqli_error($conn);

  mysqli_query($conn,"
  INSERT INTO TOPIC (
    TITLE,
    DESCRIPTION,
    CREATED
  ) VALUES (
    'MySQL',
    'MySQL is....',
    NOW()
)");

 ?>
