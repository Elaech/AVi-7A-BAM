<?php

//Refactoring Done By Minut Mihai Dimitrie
//additions: Cretu Bogdan & Ionita Andra
class Constants{
    //CONTROLLERS
    const HOME = "http://localhost/AVi-7A-BAM/public/home/index";
    const SIGNIN_LOGOUT = "http://localhost/AVi-7A-BAM/public/SignIn/logout";
    const SIGNIN_LOGIN = "http://localhost/AVi-7A-BAM/public/SignIn/index";
    const SIGNIN_LOGIN_WPARAM = "http://localhost/AVi-7A-BAM/public/signin/login";
    
    const ACCOUNT_MENU_USER = "http://localhost/AVi-7A-BAM/public/accountmenu/changeUsername";
    const ACCOUNT_MENU_PASS = "http://localhost/AVi-7A-BAM/public/accountmenu/changePassword";
    const ACCOUNT_MENU_EMAIL = "http://localhost/AVi-7A-BAM/public/accountmenu/changeEmail";

    const CREATEACCOUNT = "http://localhost/AVi-7A-BAM/public/createaccount/index";
    const STATISTICS = "http://localhost/AVi-7A-BAM/public/statistics/index";
    const CONTACT = "http://localhost/AVi-7A-BAM/public/contact/index";
    const DOCUMENTATION = "http://localhost/AVi-7A-BAM/public/Documentation";
    const MANUAL = "http://localhost/AVi-7A-BAM/public/Manual";
    const CREATEACCOUNT_MAKEACC = "http://localhost/AVi-7A-BAM/public/createaccount/makeAccount";
    const ACCOUNTMENU = "http://localhost/AVi-7A-BAM/public/AccountMenu/index";
    //HEADER LOCATION
    const LOCATION_HOME = "location: http://localhost/AVi-7A-BAM/public/home/index";
    const LOCATION_SIGNIN = "location: http://localhost/AVi-7A-BAM/public/signin/index";
    const LOCATION_ACCOUNTMENU = "location: http://localhost/AVi-7A-BAM/public/accountmenu/index";
    const LOCATION_CREATEACCOUNT = "location: http://localhost/AVi-7A-BAM/public/createaccount/index";
    
    //OUTSIDER LOCATIONS
    const GITHUB = "https://github.com/";
    const TRELLO = "https://trello.com/";
    const FII = "https://www.info.uaic.ro/";

    //CSS PATHS
    const CSS_ACCOUNTMENU = "http://localhost/AVi-7A-BAM/public/Styles/AccountMenu.css" ;
    const CSS_CREATEACCOUNT = "http://localhost/AVi-7A-BAM/public/Styles/CreateAcc.css" ;
    const CSS_SIGNIN = "http://localhost/AVi-7A-BAM/public/Styles/SignIn.css";
    const CSS_CONTACT = "http://localhost/AVi-7A-BAM/public/Styles/ContactPage.css";
    const CSS_HOME = "http://localhost/AVi-7A-BAM/public/Styles/HomePage.css";
    const CSS_STATISTICS = "http://localhost/AVi-7A-BAM/public/Styles/StatisticsPage.css";
    //JS PATHS
    const JS_FILTRATION = "http://localhost/AVi-7A-BAM/public/Styles/FiltrationMenu.js";
    const JS_GOOGLE_CHART = "https://www.gstatic.com/charts/loader.js";

    //IMAGE RESOURCES
    const FAVICON = "http://localhost/AVi-7A-BAM/public/Styles/logo-icon.png";
    const LOGO_WHITE = "http://localhost/AVi-7A-BAM/public/Styles/logo-iconalb.png";
    const DEFAULT_USERICON = "http://localhost/AVi-7A-BAM/public/Styles/user.png";
    const OUR_LOCATION = "http://localhost/AVi-7A-BAM/public/Styles/location.png";
    const HOME_BACKIMAGE = "http://localhost/AVi-7A-BAM/public/Styles/back.jpg";
    const HOME_SCOPEIMAGE = "http://localhost/AVi-7A-BAM/public/Styles/scope1.png";
    const HOME_WHYIMAGE = "http://localhost/AVi-7A-BAM/public/Styles/scope3.png";
    const HOME_PURPOSEIMAGE = "http://localhost/AVi-7A-BAM/public/Styles/scope2.png";
    const GITHUB_ICON = "http://localhost/AVi-7A-BAM/public/Styles/githubLogo.png";
    const TRELLO_ICON = "http://localhost/AVi-7A-BAM/public/Styles/trelloLogo.png";
    const FII_ICON = "http://localhost/AVi-7A-BAM/public/Styles/fiiLogo.png";
    const SVG_XML_NAMESPACE = "http://www.w3.org/2000/svg";
    const NAV_DEFAULT_USERICON = "http://localhost/AVi-7A-BAM/public/Styles/user.png";
    //TEXT RESOURCES
    const TEXT_FONT = "https://fonts.googleapis.com/css?family=Ubuntu";

    //TIME CONSTANTS
    const TIME_ONE_DAY = 86400;
    const TIME_ONE_WEEK = 7 * 86400;
    const TIME_ONE_MONTH = 30 * 86400;


    //AVIAUTH CONSTANTS
    const AUTH_CREATE = ["method"=>"POST","url"=>"http://localhost/AVIAUTH/api/create"];
    const AUTH_CHECK = ["method"=>"POST","url"=>"http://localhost/AVIAUTH/api/check"];
    const AUTH_UPDATE = ["method"=>"PUT","url"=>"http://localhost/AVIAUTH/api/update"];
    const AUTH_LOGOUT = ["method"=>"PUT","url"=>"http://localhost/AVIAUTH/api/logout"];
    const AUTH_DETAILS = ["method"=>"GET","url"=>"http://localhost/AVIAUTH/api/details"];

    //AVIACC CONSTANTS
    const ACC_DETAILS = ["method"=>"POST","url"=>"http://localhost/AViACC/api/"];
}