    <style>
     .dropdown {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.06)) repeat scroll 0 0 #F2F2F2;
    border-color: #FFFFFF #F7F7F7 #F5F5F5;
    border-image: none;
    border-radius: 3px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.08);
    display: inline-block;
    height: 28px;
    overflow: hidden;
    position: relative;
    width: 150px;
}
.dropdown:before, .dropdown:after {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: #888888 rgba(0, 0, 0, 0);
    border-image: none;
    border-style: dashed;
    border-width: 4px;
    content: "";
    height: 0;
    pointer-events: none;
    position: absolute;
    right: 10px;
    top: 9px;
    width: 0;
    z-index: 2;
}
.dropdown:before {
    border-bottom-style: solid;
    border-top: medium none;
}
.dropdown:after {
    border-bottom: medium none;
    border-top-style: solid;
    margin-top: 7px;
}
.dropdown-select {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0) !important;
    border: 0 none;
    border-radius: 0;
    color: #62717A;
    font-size: 12px;
    height: 28px;
    line-height: 14px;
    margin: 0;
    padding: 6px 8px 6px 10px;
    position: relative;
    text-shadow: 0 1px #FFFFFF;
    width: 130%;
}
.dropdown-select:focus {
    color: #394349;
    outline: 2px solid #49AFF2;
    outline-offset: -2px;
    width: 100%;
    z-index: 3;
}
.dropdown-select > option {
    background: none repeat scroll 0 0 #F2F2F2;
    border-radius: 3px;
    cursor: pointer;
    margin: 3px;
    padding: 6px 8px;
    text-shadow: none;
}

    </style>
