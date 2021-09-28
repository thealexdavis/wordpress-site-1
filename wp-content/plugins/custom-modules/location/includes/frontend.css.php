#map-canvas{
    height: 500px;
    width: 100%;
    max-width: 100%;
    position: relative;
  }
  
  .placeDiv {
    z-index: 1;
    position: absolute;
    top: -30px;
    left: 10px;
  }
  
  .map-container {
    position: relative;
  }
  
  .placecard__container {
      box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px;
      max-width: 500px;
      width: 100%;
      background: rgb(255, 255, 255) none repeat scroll 0% 0% / auto padding-box border-box;
      border-radius: 2px 2px 2px 2px;
      font: normal normal normal normal 11px / normal Roboto, Arial, sans-serif;
      margin: 0;
      padding: 9px 4px 9px 11px;
      overflow: hidden;
    }
    
    .placecard__left {
      float: left;
      width: 75%;
    }
    
    .placecard__right {
      text-align: center;
      float: left;
      width: 25%;
    }
    
    .placecard__business-name {
      cursor: default;
      height: 19px;
      text-overflow: ellipsis;
      white-space: nowrap;
      width: 390px;
      perspective-origin: 100px 9.5px;
      transform-origin: 100px 9.5px;
      font-size: 14px;
      overflow: hidden;
      margin: 0;
    }
    
    .placecard__info {
      color: rgb(91, 91, 91);
      cursor: default;
      height: auto;
      width: 250px;
      column-rule-color: rgb(91, 91, 91);
      perspective-origin: 100px 16px;
      transform-origin: 100px 16px;
      border: 0px none rgb(91, 91, 91);
      font-size: 12px !important;
      margin: 6px 0px 0px;
      padding: 0 0 5px 0;
      outline: rgb(91, 91, 91) none 0px;
    }
    .placecard__left .reviews img { width: 12px; margin-left: 1px; }
    .placecard__left .reviews img:last-child { margin-left: 0; }
  
    .reviews__Block { display: inline-block; vertical-align: middle; }
  
    .card__rating { color: #d17c2c; font-size: 16px; }
    .card__rating.top { font-size: 20px; margin-right: 5px; }
  
    .google__g {
        margin-right: 10px !important;
        width: 50px !important;
        vertical-align: middle;
        display: inline-block;
    }
  
    .g__text {
        margin: 0;
        color: #777 !important;
        font-size: 12px;
        line-height: 140%;
        padding: 0 !important;
    }
  
    .g__text.top { color: #444 !important; }
    
    .placecard__direction-icon {
      background: rgba(0, 0, 0, 0) url("https://maps.gstatic.com/mapfiles/embed/images/entity11.png") repeat scroll 0px 0px / 70px 210px padding-box border-box;
      height: 22px;
      width: 22px;
      margin-right: auto;
      margin-left: auto;
    }
    
    .placecard__direction-link {
      color: rgb(58, 132, 223);
      display: block;
      height: 43px;
      text-decoration: none;
      width: 100%;
    }
    
    .placecard__view-large {
      display: block;
      margin-top: 10px;
      color: rgb(58, 132, 223);
      text-decoration: none;
    }
  
    .marker-position {
      bottom: -5px;
      right: 100%;
      position: relative;
      transform: translateX(50%);
      margin-right: 15px;
      text-align: right;
      text-shadow:  -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;
  }
  
    @media only screen and (max-width: 479px) {
      .placeDiv { top: 10px; }
      .placecard__business-name { width: auto; }
    }
  
  .mapBname { margin-left: 30px; }

@charset "UTF-8";
:root {
  --star-size: 20px;
  --star-color: #e1e1e1 ;
  --star-background: #e7711b;
}

.Stars {
  --percent: calc(var(--rating) / 5 * 100%);
  display: inline-block;
  font-size: var(--star-size);
  font-family: Times;
  line-height: 1;
}
.Stars::before {
  content: "★★★★★";
  letter-spacing: -1px;
  background: linear-gradient(90deg, var(--star-background) var(--percent), var(--star-color) var(--percent));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.Stars2 {
  --percent: calc(var(--rating) / 5 * 100%);
  display: inline-block;
  font-size: 16px;
  font-family: Times;
  line-height: 1;
}
.Stars2::before {
  content: "★★★★★";
  letter-spacing: -1px;
  background: linear-gradient(90deg, var(--star-background) var(--percent), var(--star-color) var(--percent));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}