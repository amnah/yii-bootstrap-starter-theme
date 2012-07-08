bootstrap
=========

This is for getting you set up with Twitter's bootstrap quickly. All you need to do is

1) Put the files into the Yii application at `themes\bootstrap\`

2) Add theme info into main configuration

    
    return array(
        'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        'name'=>'My Web Application',
        'theme'=>'bootstrap',