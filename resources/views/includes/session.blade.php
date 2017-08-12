
    @if(session('user_created'))
        <div class="alert alert-success">{{ session()->pull('user_created') }}</div>
    @endif
    @if(session('user_updated'))
        <div class="alert alert-success">{{ session()->pull('user_updated') }}</div>
    @endif
    @if(session('user_deleted'))
        <div class="alert alert-success">{{ session()->pull('user_deleted') }}</div>
    @endif
    @if(session('category_created'))
        <div class="alert alert-success">{{ session()->pull('category_created') }}</div>
    @endif
    @if(session('category_deleted'))
        <div class="alert alert-success">{{ session()->pull('category_deleted') }}</div>
    @endif
    @if(session('category_updated'))
        <div class="alert alert-success">{{ session()->pull('category_updated') }}</div>
    @endif
    @if(session('photo_deleted'))
        <div class="alert alert-success">{{ session()->pull('photo_deleted') }}</div>
    @endif
    @if(session('post_created'))
        <div class="alert alert-success">{{ session()->pull('post_created') }}</div>
    @endif
    @if(session('post_updated'))
        <div class="alert alert-success">{{ session()->pull('post_updated') }}</div>
    @endif
    @if(session('post_deleted'))
        <div class="alert alert-success">{{ session()->pull('post_deleted') }}</div>
    @endif
    @if(session('selected_deleted'))
        <div class="alert alert-success">{{ session()->pull('selected_deleted') }}</div>
    @endif
    @if(session('posts_deleted'))
        <div class="alert alert-success">{{ session()->pull('posts_deleted') }}</div>
    @endif
    @if(session('users_deleted'))
        <div class="alert alert-success">{{ session()->pull('users_deleted') }}</div>
    @endif
    @if(session('message_sent'))
        <div class="alert alert-success">{{ session()->pull('message_sent') }}</div>
    @endif
    @if(session('emails_deleted'))
        <div class="alert alert-success">{{ session()->pull('emails_deleted') }}</div>
    @endif
    @if(session('email_deleted'))
        <div class="alert alert-success">{{ session()->pull('email_deleted') }}</div>
    @endif