<div class="row w-100">
    {{-- SHOW POSTS --}}
    <div class="col-xl-12">
        <div class="text-center"><h2>Review Posts</h2></div>
        <div id="thePosts">
            @foreach ($thisPosts as $post)
            <div class="showPost">
                <div class="postDetails">
                    <div class="postDate"><p>Posted at: {{ $post->updated_at }}</p></div>
                    <div class="postUser"><p>User: {{ $post->id }}</p></div>
                </div>
                <div class="postTitle"><h2>{{ $post->title }}</h2></div>
                @if ($post->comment != null)
                    <div class="postComment"><p>{{ $post->comment }}</p></div>
                @else
                    <div class="noComment"></div>
                @endif
                @if ($post->url != null)
                    <div class="postURL"><iframe src="{{ $post->url }}"></iframe></div>
                @else
                    <div class="noURL"></div>
                @endif
                <div>
                    <p>Other tags: </p>
                    @if (isset($post->driverId_1))
                        <p>&nbsp;{{ $post->driverId_1 }},</p>
                    @endif
                    @if (isset($post->driverId_2))
                        <p>&nbsp;{{ $post->driverId_2 }},</p>
                    @endif
                    @if (isset($post->driverId_3))
                        <p>&nbsp;{{ $post->driverId_3 }},</p>
                    @endif      
                    @if (isset($post->defaultDriver))
                        <p>&nbsp;{{ $post->defaultDriver }},</p>
                    @endif                   
                    @if (isset($post->constructorId_1))
                        <p>&nbsp;{{ $post->constructorId_1 }},</p>
                    @endif
                    @if (isset($post->constructorId_2))
                        <p>&nbsp;{{ $post->constructorId_2 }},</p>
                    @endif
                    @if (isset($post->constructorId_3))
                        <p>&nbsp;{{ $post->constructorId_3 }},</p>
                    @endif
                    @if (isset($post->defaultConstructor))
                        <p>&nbsp;{{ $post->defaultConstructor }},</p>
                    @endif  
                    @if (isset($post->circuitId_1))
                        <p>&nbsp;{{ $post->circuitId_1 }},</p>
                    @endif
                    @if (isset($post->circuitId_2))
                        <p>&nbsp;{{ $post->circuitId_2 }},</p>
                    @endif
                    @if (isset($post->circuitId_3))
                        <p>&nbsp;{{ $post->circuitId_3 }},</p>
                    @endif
                    @if (isset($post->defaultCircuit))
                        <p>&nbsp;{{ $post->defaultCircuit }},</p>
                    @endif  
                    @if (isset($post->year))
                        <p>&nbsp;{{ $post->year }},</p>
                    @endif
                    @if (isset($post->defaultSeason))
                        <p>&nbsp;{{ $post->defaultSeason }},</p>
                    @endif  
                    @if (isset($post->raceId_1))
                        <p>&nbsp;{{ $post->raceId_1 }}</p>
                    @endif
                    @if (isset($post->raceId_2))
                        <p>&nbsp;{{ $post->raceId_2 }}</p>
                    @endif
                    @if (isset($post->raceId_3))
                        <p>&nbsp;{{ $post->raceId_3 }}</p>
                    @endif
                    @if (isset($post->defaultRace))
                        <p>&nbsp;{{ $post->defaultRace }},</p>
                    @endif  
                </div>

                <div style="display:flex; justify-content: space-evenlty; width: 100%;">
                    <form method="POST" action="/approve_post" style="width: 100%;">@csrf
                        <input type="hidden" id="postId" name="postId" value="{{ $post->postId }}">
                        <input type="submit" value="Approve">
                    </form>
                    <form method="POST" action="/delete_post" style="width: 100%;">@csrf
                        <input type="hidden" id="postId" name="postId" value="{{ $post->postId }}">
                        <input type="submit" value="Delete" style="background-color: #FF4500;">
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
</div>