import './bootstrap';
import lightGallery from 'lightgallery';
import 'lightgallery/css/lightgallery.css';
import lgThumbnail from 'lightgallery/plugins/thumbnail';
import lgZoom from 'lightgallery/plugins/zoom';
$(document).ready(function() {
    $('#lightgallery').lightGallery();
});