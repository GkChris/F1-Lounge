<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<div class="row" id="comm_posts">
    
    <div class="comment_section">
        <div class="d-flex justify-content-center w-100" style=""><h1 style="border-top: 1px solid silver; border-bottom:1px solid silver; padding: auto 5rem auto 5rem;">Comment Section</h1></div>
        {{-- MAKE POSTS BUTTON --}}
        <div id="makePost">
            @if ($thisPosts->count() > 0)
                @auth
                    <p onclick="openCreatePost();">Make a comment</p>
                @else
                    <p onclick="openLoginRequest()">Make a comment</p>
                @endauth  
            @else
                @auth
                    <p onclick="openCreatePost();">Be the first to make a comment</p>
                @else
                    <p onclick="openLoginRequest();">Be the first to make a comment</p>
                @endauth  
            @endif
        </div>
        {{-- CREATE POST --}}
        @auth
        <div id="createPost">
            <div id="theForm">
                <form method="POST" action="/create_post">@csrf
                    <label style="margin-top: 8px;" for="postTitle">Title</label>
                    <input type="text" id="postTitle" name="postTitle" placeholder="Title" required>
                

                    <label style="margin-top: 8px;" for="postComment">Comment</label>
                    <textarea id="postComment" name="postComment" cols="40" rows="5" placeholder="Text.. (Optional)"></textarea>


                    <label style="margin-top: 8px;" for="postURL">YouTube content</label>
                    <input type="url" id="postURL" name="postURL" placeholder="YouTube URL.. (Optional)">


                    {{--  tags  --}}
                    <label style="margin-top: 8px;" for="postTags">Tags <i> (Optional - Current page is automatically tagged)</i></label>
                    {{-- <input type="text" id="postTags" name="postTags" placeholder="Driver, Constructor, Circuit, year.. (Optional)"> --}}
                    {{-- GIA TA TAGS THELOYME 5 HIDDEN INPUTS GIA KATHE EIDOS TAG. 
                    TA ONOMATA THA TA PAIRNOYME APO TO JSON TOY SEARCH POY THA FTIAXOUMY
                    ENW THN ANTISTOIXIA ONOMA/ID THA THN KANEI METEPITA O SERVER GIA LOGOUS ASFALEIAS --}}
                    <div id="postTags">
                        <div class="postTags_subDivs" id="driverTags" onclick="changeTagNav(this);">Driver(s) <i class="fa fa-caret-down"></i></div>
                        <div class="postTags_subDivs" id="constructorTags" onclick="changeTagNav(this);">Constructor(s) <i class="fa fa-caret-down"></i></div>
                        <div class="postTags_subDivs" id="circuitTags" onclick="changeTagNav(this);">Circuit(s) <i class="fa fa-caret-down"></i></div>
                        <div class="postTags_subDivs" id="seasonTags" onclick="changeTagNav(this);">Season(s) <i class="fa fa-caret-down"></i></div>
                        <div class="postTags_subDivs" id="raceTags" onclick="changeTagNav(this);">Round(s) <i class="fa fa-caret-down"></i></div>
                    </div>

                    <div id="postTags_inputs">
                        <div id="driverTags_inputs">
                            <input type="hidden" id="driverTag_1" value="" name="driverTag_1">
                            <input type="hidden" id="driverTag_2" value="" name="driverTag_2">
                            <input type="hidden" id="driverTag_3" value="" name="driverTag_3">
                        </div>
                        <div id="constructorTags_inputs">
                            <input type="hidden" id="constructorTag_1" value="" name="constructorTag_1">
                            <input type="hidden" id="constructorTag_2" value="" name="constructorTag_2">
                            <input type="hidden" id="constructorTag_3" value="" name="constructorTag_3">
                        </div>
                        <div id="circuitTags_inputs">
                            <input type="hidden" id="circuitTag_1" value="" name="circuitTag_1">
                            <input type="hidden" id="circuitTag_2" value="" name="circuitTag_2">
                            <input type="hidden" id="circuitTag_3" value="" name="circuitTag_3">
                        </div>
                        <div id="seasonTags_inputs">
                            <input type="hidden" id="seasonTag_1" value="" name="seasonTag_1">
                            <input type="hidden" id="seasonTag_2" value="" name="seasonTag_2">
                            <input type="hidden" id="seasonTag_3" value="" name="seasonTag_3">
                        </div>
                        <div id="raceTags_inputs">
                            <input type="hidden" id="raceTag_1" value="" name="raceTag_1">
                            <input type="hidden" id="raceTag_2" value="" name="raceTag_2">
                            <input type="hidden" id="raceTag_3" value="" name="raceTag_3">
                        </div>
                        <div id="defaultTags">
                            @if (isset($thisDriver))
                                <input type="hidden" id="defaultDriver" value="{{ $thisDriver->forename }} {{ $thisDriver->surname }}" name="defaultDriver">
                            @endif
                            @if (isset($thisConstructor))
                                <input type="hidden" id="defaultConstructor" value="{{ $thisConstructor->name }}" name="defaultConstructor">
                            @endif
                            @if (isset($thisCircuit))
                                <input type="hidden" id="defaultCircuit" value="{{ $thisCircuit->name }}" name="defaultCircuit">
                            @endif
                            @if (isset($thisSeason))
                                <input type="hidden" id="defaultSeason" value="{{ $thisSeason->year }}" name="defaultSeason">
                            @endif
                            @if (isset($thisRace))
                                <input type="hidden" id="defaultSeason" value="{{ $thisRace->year }}" name="defaultSeason">
                                <input type="hidden" id="defaultRace" value="{{ $thisRace->round }}" name="defaultRace">
                            @endif
                        </div>
                    </div>

                    <div id="postModal">
                        <div id="postTags_extra">
                            <div id="selectedTags" class="rounded">
                                <p><strong>Drivers</strong></p>
                                <p id="driverTag_1_p">-</p>
                                <p id="driverTag_2_p">-</p>
                                <p id="driverTag_3_p">-</p>
                                <p><strong>Constructors</strong></p>
                                <p id="constructorTag_1_p">-</p>
                                <p id="constructorTag_2_p">-</p>
                                <p id="constructorTag_3_p">-</p>
                                <p><strong>Circuits</strong></p>
                                <p id="circuitTag_1_p">-</p>
                                <p id="circuitTag_2_p">-</p>
                                <p id="circuitTag_3_p">-</p>
                                <p><strong>Seasons</strong></p>
                                <p id="seasonTag_1_p">-</p>
                                <p id="seasonTag_2_p">-</p>
                                <p id="seasonTag_3_p">-</p>
                                <p><strong>Rounds</strong></p>
                                <p id="raceTag_1_p">-</p>
                                <p id="raceTag_2_p">-</p>
                                <p id="raceTag_3_p">-</p>
                            </div>
                            <div id="updated_div">
                                <div id="search_result_box" class="rounded">
                                    <div id="suggestions">1</div>
                                </div>
                                <div id="tagReset">
                                    <p class="rounded" onclick="clearThis();">Clear category tags</p>
                                    <p class="rounded" onclick="clearAll();">Clear all tags</p>
                                </div>
                            </div>
                        </div>
                        <div id="postSearch">
                            {{-- <p>Search</p> --}}
                            <div class="form-group" id="searchForm">
                                <input type="text" class="form-controller" id="search" name="search" onkeyup="searchAll();">                              
                            </div>
                        </div>
                    </div>
                    
                    

                   
                    <input type="hidden" id="postUser" name="postUser" value="{{ Auth::user()->id }}">

                    <input type="submit" value="Post">
                  </form>
            </div>
        </div>
        @endauth

        {{-- SHOW POSTS --}}
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
                @if (isset($post->driverId_1) || isset($post->driverId_2) || isset($post->driverId_3) || isset($post->constructorId_1) || isset($post->constructorId_2) || isset($post->constructorId_3) || isset($post->circuitId_1) || isset($post->circuitId_2) || isset($post->circuitId_3) || isset($post->year) || isset($post->raceId_1) || isset($post->raceId_2) || isset($post->raceId_3))
                <div class="postTags">
                    <p>Extra tags: </p>
                    @if (isset($post->driverId_1))
                        <p>&nbsp;{{ $post->driverId_1 }},</p>
                    @endif
                    @if (isset($post->driverId_2))
                        <p>&nbsp;{{ $post->driverId_2 }},</p>
                    @endif
                    @if (isset($post->driverId_3))
                        <p>&nbsp;{{ $post->driverId_3 }},</p>
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
                    @if (isset($post->circuitId_1))
                        <p>&nbsp;{{ $post->circuitId_1 }},</p>
                    @endif
                    @if (isset($post->circuitId_2))
                        <p>&nbsp;{{ $post->circuitId_2 }},</p>
                    @endif
                    @if (isset($post->circuitId_3))
                        <p>&nbsp;{{ $post->circuitId_3 }},</p>
                    @endif
                    @if (isset($post->year))
                        <p>&nbsp;{{ $post->year }},</p>
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
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>

