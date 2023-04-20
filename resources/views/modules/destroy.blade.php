<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete Session</title>
</head>
<body>
<h1>Delete Session</h1>
<form method="POST" action="{{ route('sessions.destroy', ['session' => $session->id]) }}">
    @csrf
    @method('DELETE')
    <p>Are you sure you want to delete this session?</p>
    <p>Session ID: {{ $session->id }}</p>
    <p>User ID: {{ $session->user_id }}</p>
    <p>IP Address: {{ $session->ip_address }}</p>
    <p>User Agent: {{ $session->user_agent }}</p>
    <p>Last Activity: {{ $session->last_activity }}</p>
    <button type="submit">Delete Session</button>
</form>
</body>
</html>
