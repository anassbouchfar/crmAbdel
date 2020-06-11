<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="{{route('add_audio')}}" method="post" enctype="multipart/form-data">
        @csrf 
    <input type="file" name="audio">
    <button type="submit">submit</button>
    </form>

    <audio controls id="audio" src="MyRecording.wav"></audio>


</body>
</html>