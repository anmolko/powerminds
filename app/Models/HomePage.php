<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;
    protected $table ='homepages';
    protected $fillable =['id','welcome_heading','mv_heading','mv_subheading','mv_description','mission','vision','value','mv_image','welcome_subheading','welcome_description','welcome_button','welcome_button2','welcome_link2','action_heading','action_heading2','action_link','action_link2','action_button','action_button2','welcome_link','welcome_image','welcome_side_image','direction_heading','direction_description','direction_list_heading','direction_list_description','direction_list_image','direction_displaying_side_image','direction_container_color','background_heading','background_subheading','background_description','background_image','background_side_image','core_main_heading','core_main_description','core_heading1','core_description1','core_heading2','core_description2','core_heading3','core_description3','core_heading4','core_description4','core_heading5','core_description5','core_heading6','core_description6','core_heading7','core_description7','core_heading8','core_description8','what_heading1','what_heading2','what_heading3','what_heading4','what_heading5','what_image1','what_image2','what_image3','what_image4','what_image5','project_completed','happy_clients','visa_approved','success_stories','why_heading','why_subheading','why_description','why_button','why_link'
        ,'tf_heading1','tf_heading2','tf_heading3','tf_description1','tf_description2','tf_description3'
        ,'ww_main_heading','ww_main_subheading','ww_main_description','ww_heading1','ww_heading2','ww_heading3','ww_heading4','ww_description1','ww_description2','ww_description3','ww_description4','created_by','updated_by'];
}
