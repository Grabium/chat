<div class="container">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <strong>Chat room </strong>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox chat-view">
                <div class="ibox-title">
                    <small class="pull-right text-muted">Last message:  Mon Jan 26 2015 - 18:39:23</small> Chat room panel
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-9 ">
                            <div class="chat-discussion">
                                @foreach($messages as $message)
                                    <div class="chat-message {{auth()->user()->id === $message->user_id ? 'right' : 'left'}}">
                                        <img class="message-avatar" src="{{$message->user_avatar}}" alt="">
                                        <div class="message">
                                            <a class="message-author" href="#">{{ $message->user_name }}</a>
                                            <span class="message-date">  {{ dateFormat($message->created_at) }} </span>
                                            <span class="message-content">{{ $message->content }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="chat-users">
                                <div class="users-list">
                                    @foreach($users as $user)
                                        <div class="chat-user">
                                            <span id="user-{{ 'user-status-' . $user->id }}" class="pull-right label label-primary">{{$user->last_seen ? 'Online' : 'Offline'}}</span>
                                            <img class="chat-avatar" src="{{$user->avatar}}" alt="">
                                            <div class="chat-user-name">
                                                <a wire:click="setRoomByUserId({{ $user->id }})" href="#">{{ $user->name }}</a>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <form wire:submit.prevent="sendMessage">
                            <div class="col-lg-12">
                                <div class="chat-message-form">
                                    <div class="form-group">
                                        <textarea wire:model="message" class="form-control message-input" name="message" placeholder="Enter message text and press enter"></textarea>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>