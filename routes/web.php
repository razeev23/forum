<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/discuss', function () {
    return view('discuss');
});
//social authntication routes
Route::get('{provider}/auth','SocialsController@auth')->name('social.auth');
Route::get('{provider}/redirect','SocialsController@auth_callback')->name('auth_callback');


Auth::routes();

Route::get('/forum', 'ForumsController@index')->name('forum');



Route::get('/channel/{slug}',[

    'uses'=>'ForumsController@channel',
    'as'=>'channel'
]);
Route::get('dicussions/{slug}',[
    'uses'=>'DiscussionsController@show',
    'as'=>'discussion'
]);

Route::group(['middleware'=>'auth'],function()
    {
        Route::resource('channels','ChannelsController');
        Route::get('discussions/create/new',[
                    'uses'=>'DiscussionsController@create',
                    'as'=>'discussions.create'
                ]);
        Route::get('discussions/store',[
                    'uses'=>'DiscussionsController@store',
                    'as'  =>'discussions.store'
                ]);
        
      
        Route::post('discussions/reply/{id}',[
                    'uses'=>'DiscussionsController@reply',
                    'as'=>'discussions.reply'
                    ]);
        Route::get('reply/like/{id}',[
            'uses'=>'RepliesController@like',
            'as'=>'reply.like'

            ]);
            Route::get('reply/unlike/{id}',[
                'uses'=>'RepliesController@unlike',
                'as'=>'reply.unlike'
    
                ]);

        Route::get('discussions/watch/{id}',[
                    'uses'=>'WatchersController@watch',
                    'as'=>'discussions.watch'
                    ]);
        Route::get('discussions/unwatch/{id}',[
                        'uses'=>'WatchersController@unwatch',
                        'as'=>'discussions.unwatch'
                        ]);

        Route::get('discussion/reply/best/{id}',[
                        'uses'=>'RepliesController@best_answer',
                        'as'=>'discussion.reply.best'

                    ]);
    });

