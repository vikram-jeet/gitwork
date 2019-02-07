<?php

if( !class_exists('CentireFacilities') ) {

	/**
	 * Class CentirePlans
	 *
	 * Theme core functions here
	 */
	class CentireFacilities {


		function __construct() {

			add_shortcode('HHW_SHOW_FACILITIES_CATEGORIES',[$this,'categories']);
			add_shortcode('HHW_SHOW_ARCHIVE_FACILITIES',[$this,'facilities']);

		}

		public function categories() {

			$categoriesHTML =<<<HTML
			<ul>
            	<li><a href="#">SEE ALL CLASSES</a></li>
                <li><a href="#">FULL BODY</a></li>
                <li><a href="#">GET TONED</a></li>
                <li><a href="#">IMPROVE BALANCE</a></li>
                <li><a href="#">BUILD STRENGTH</a></li>
                <li><a href="#">IMPROVE CARDIO</a></li>
            </ul>
HTML;

return $categoriesHTML;

		}

		public function facilities() {

			$facilitiesHTML =<<<HTML
<div class="listing-row">
            	<div class="listing-image">
                	<img alt="" src="images/reformer-image.jpg" srcset="images/reformer-image.jpg 1x, images/reformer-image_2x.jpg 2x" />
                </div>
                <div class="listing-content">
                	<div>
                        <h2><span class="facilities-content-icon"><img alt="" src="images/reformer-active.png" srcset="images/reformer-active.png 1x, images/reformer-active_2x.png 2x" /></span><span>Reformer Pilates</span></h2>  
                        <p>
                            Reformer Pilates is for anyone looking to get lean, toned and fit - fast. Reset, readjust, restart and refocus to create a 
                            more balanced body in the newly renovated loft at Hendra Healthworks.
                        </p>    	
                        <p class="duration"><strong>Class Duration</strong>: 45 Minutes</p>
                    </div>
                    <div class="listing-bar">
                    	<ul>
                        	<li>Improve <span>balance</span></li>
                            <li>Get <span>lean & toned</span></li>
                            <li>Work <span>major muscles</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="listing-row">
            	<div class="listing-image">
                	<img alt="" src="images/bodypump-image.jpg" srcset="images/bodypump-image.jpg 1x, images/bodypump-image_2x.jpg 2x" />
                </div>
                <div class="listing-content">
                	<div>
                        <h2><span class="facilities-content-icon"><img alt="" src="images/bodypump-active.png" srcset="images/bodypump-active.png 1x, images/bodypump-active_2x.png 2x" /></span><span>Bodypump<sup>TM</sup></span></h2>  
                        <p>
                            Using light to moderate weights with lots of repetition, BODYPUMP gives you a total body workout. It will burn up to 
                            540 calories*. You’ll leave the class feeling challenged and motivated, ready to come back for more. 
                        </p>    	
                        <p class="duration"><strong>Class Duration</strong>: 55, 45 or 30-minute workout.</p>
                    </div>
                    <div class="listing-bar">
                    	<ul>
                        	<li>Build <span>strength</span></li>
                            <li>Get <span>lean & toned</span></li>
                            <li>Work <span>major muscles</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="listing-row">
            	<div class="listing-image">
                	<img alt="" src="images/rpm-image.jpg" srcset="images/rpm-image.jpg 1x, images/rpm-image_2x.jpg 2x" />
                </div>
                <div class="listing-content">
                	<div>
                        <h2><span class="facilities-content-icon"><img alt="" src="images/rpm-active.png" srcset="images/rpm-active.png 1x, images/rpm-active_2x.png 2x" /></span><span>RPM<sup>TM</sup></span></h2>  
                        <p>
                            RPM™ is a group indoor cycling workout where you control the intensity. It’s fun, low impact and burns loads of calories. In 
                            an RPM workout you repeatedly reach your cardio peak then ease back down, keeping pace with the pack to lift your personal 
                            performance and boost your cardio fitness.
                        </p>    	
                        <p class="duration"><strong>Class Duration</strong>: 45 Minutes</p>
                    </div>
                    <div class="listing-bar">
                    	<ul>
                        	<li>Improve <span>flexibilty</span></li>
                            <li>Feel <span>serene & relaxed</span></li>
                            <li>Build <span>strength</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="listing-row">
            	<div class="listing-image">
                	<img alt="" src="images/body-balance-image.jpg" srcset="images/body-balance-image.jpg 1x, images/body-balance-image_2x.jpg 2x" />
                </div>
                <div class="listing-content">
                	<div>
                        <h2><span class="facilities-content-icon"><img alt="" src="images/reformer-active.png" srcset="images/reformer-active.png 1x, images/reformer-active_2x.png 2x" /></span><span>Body Balance<sup>TM</sup></span></h2>  
                        <p>
                            A yoga-based class that will improve your mind, your body and your life. Breathing control is a part of all the exercises, 
                            and instructors will always provide options for those just getting started. You’ll strengthen your entire body and leave the 
                            class feeling calm and centered. 
                        </p>    	
                        <p class="duration"><strong>Class Duration</strong>: 45 Minutes</p>
                    </div>
                    <div class="listing-bar">
                    	<ul>
                        	<li>Improve <span>flexibilty</span></li>
                            <li>Feel <span>serene & relaxed</span></li>
                            <li>Build <span>strength</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="listing-row">
            	<div class="listing-image">
                	<img alt="" src="images/boxing-image.jpg" srcset="images/boxing-image.jpg 1x, images/boxing-image_2x.jpg 2x" />
                </div>
                <div class="listing-content">
                	<div>
                        <h2><span class="facilities-content-icon"><img alt="" src="images/boxing-active-icon.png" srcset="images/boxing-active-icon.png 1x, images/boxing-active-icon_2x.png 2x" /></span><span>Boxing Circuit</span></h2>  
                        <p>
                            Fit2Box and circuit classes use a variety of exercise including boxing, resistance and cardio training to give you a 
                            complete fitness workout. Great for those who want to try boxing!
                        </p>    	
                        <p class="duration"><strong>Class Duration</strong>: 45 Minutes</p>
                    </div>
                    <div class="listing-bar">
                    	<ul>
                        	<li>Strengthen <span>muscles</span></li>
                            <li>Improve <span>fitness & health</span></li>
                            <li>Decrease <span>stress</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="listing-row">
            	<div class="listing-image">
                	<img alt="" src="images/body-combat-image.jpg" srcset="images/body-combat-image.jpg 1x, images/body-combat-image_2x.jpg 2x" />
                </div>
                <div class="listing-content">
                	<div>
                        <h2><span class="facilities-content-icon"><img alt="" src="images/body-combat.png" srcset="images/body-combat.png 1x, images/body-combat_2x.png 2x" /></span><span>Body Combat</span><sup>TM</sup></h2>  
                        <p>
                            Step into a BODYCOMBAT workout and you’ll punch and kick your way to fitness, burning up to 740 calories** along the way. 
                            This high-energy martialarts inspired workout is totally non-contact and there are no complex moves to master. You’ll 
                            release stress, have a blast and feel like a champ.
                        </p>    	
                        <p class="duration"><strong>Class Duration</strong>: 55, 45 or 30-minute workout.</p>
                    </div>
                    <div class="listing-bar">
                    	<ul>
                        	<li>Feel <span>empowered</span></li>
                            <li>Fuel <span>cardio fitness</span></li>
                            <li>Train <span>fullbody</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="listing-row">
            	<div class="listing-image">
                	<img alt="" src="images/abs-image.jpg" srcset="images/abs-image.jpg 1x, images/abs-image_2x.jpg 2x" />
                </div>
                <div class="listing-content">
                	<div>
                        <h2><span class="facilities-content-icon"><img alt="" src="images/abs-active-icon.png" srcset="images/abs-active-icon.png 1x, images/abs-active-icon_2x.png 2x" /></span><span>Abs Blitz</span></h2>  
                        <p>
                            ABS BLITZ is an intense 30 minute  abdominal workout which uses many techniques. It is suitable for all fitness types.
                        </p>    	
                        <p class="duration"><strong>Class Duration</strong>: 30 Minutes</p>
                    </div>
                    <div class="listing-bar">
                    	<ul>
                        	<li>Improve <span>strength</span></li>
                            <li>Level <span>high intensity</span></li>
                            <li>Train <span>abdominals</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="listing-row">
            	<div class="listing-image">
                	<img alt="" src="images/aqua-image.jpg" srcset="images/aqua-image.jpg 1x, images/aqua-image_2x.jpg 2x" />
                </div>
                <div class="listing-content">
                	<div>
                        <h2><span class="facilities-content-icon"><img alt="" src="images/aqua-active-icon.png" srcset="images/aqua-active-icon.png 1x, images/aqua-active-icon_2x.png 2x" /></span><span>Aqua</span></h2>  
                        <p>
                            Enjoy a quick dip in the pool in Summer to cool off. We run a range of Aqua classes during summer for all fitness levels. 
                            Great for low impact exercise or injuries.
                        </p>
                    </div>
                    <div class="listing-bar">
                    	<ul>
                        	<li>Improve <span>tone</span></li>
                            <li>Fuel <span>cardio fitness</span></li>
                            <li>Train <span>full body</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="listing-row">
            	<div class="listing-image">
                	<img alt="" src="images/phase-image.jpg" srcset="images/phase-image.jpg 1x, images/phase-image_2x.jpg 2x" />
                </div>
                <div class="listing-content">
                	<div>
                        <h2><span class="facilities-content-icon"><img alt="" src="images/phase-icon.png" srcset="images/phase-icon.png 1x, images/phase-icon_2x.png 2x" /></span><span>2Phase</span></h2>  
                        <p>
                            The Class is a combination of weight training with cardio and alternate bursts of intense anaerobic exercise with short 		
                            recovery periods to keep the heart-rate elevated throughout the workout.
                        </p>
                        <p class="duration"><strong>Class Duration</strong>: 30 Minutes</p>
                    </div>
                    <div class="listing-bar">
                    	<ul>
                        	<li>Build <span>strength</span></li>
                            <li>Fuel <span>cardio fitness</span></li>
                            <li>Level <span>high intensity</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="listing-row">
            	<div class="listing-image">
                	<img alt="" src="images/yoga-image.jpg" srcset="images/yoga-image.jpg 1x, images/yoga-image_2x.jpg 2x" />
                </div>
                <div class="listing-content">
                	<div>
                        <h2><span class="facilities-content-icon"><img alt="" src="images/yoga-active-icon.png" srcset="images/yoga-active-icon.png 1x, images/yoga-active-icon_2x.png 2x" /></span><span>Yoga</span></h2>  
                        <p>
                            Yoga is the emphasis is on postural and breathing awareness while strengthening pelvic floor muscles and increasing 		
                            flexibility of your muscles and joints, promoting inner calm and strength.
                        </p>
                        <p class="duration"><strong>Class Duration</strong>: 30 Minutes</p>
                    </div>
                    <div class="listing-bar">
                    	<ul>
                        	<li>Ignore <span>balance & Flexibility</span></li>
                            <li>Decrease <span>stress</span></li>
                            <li>Build <span>muscle strength</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="listing-row">
            	<div class="listing-image">
                	<img alt="" src="images/step-image.jpg" srcset="images/step-image.jpg 1x, images/step-image_2x.jpg 2x" />
                </div>
                <div class="listing-content">
                	<div>
                        <h2><span class="facilities-content-icon"><img alt="" src="images/step-active-icon.png" srcset="images/step-active-icon.png 1x, images/step-active-icon_2x.png 2x" /></span><span>Step Class</span></h2>  
                        <p>
                            Freestyle Step is a class for those who enjoy the challenge of new combinations and moves. Step platform can be adjusted 
                            for all levels.
                        </p>
                    </div>
                    <div class="listing-bar">
                    	<ul>
                        	<li>Fuel <span>cardio fitness</span></li>
                            <li>Feel <span>uplifted</span></li>
                            <li>Tone <span>glutes & legs</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="listing-row">
            	<div class="listing-image">
                	<img alt="" src="images/shrded-image.jpg" srcset="images/shrded-image.jpg 1x, images/shrded-image_2x.jpg 2x" />
                </div>
                <div class="listing-content">
                	<div>
                        <h2><span class="facilities-content-icon"><img alt="" src="images/shrded-active-icon.png" srcset="images/shrded-active-icon.png 1x, images/shrded-active-icon_2x.png 2x" /></span><span>Shred</span></h2>  
                        <p>
                            Shred is a 45 minute high intensity, fun and effective interval/circuit workout. You will shred fat,define muscle, rev up 
                            your metabolism and transform the look of your entire physique and dramatically enhance your overall health and athletic 
                            performance.
                        </p>
                        <p class="duration"><strong>Class Duration</strong>: 30 Minutes</p>
                    </div>
                    <div class="listing-bar">
                    	<ul>
                        	<li>Improve <span>balance & flexibility</span></li>
                            <li>Decrease <span>stress</span></li>
                            <li>Build <span>muscle strength</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="listing-row">
            	<div class="listing-image">
                	<img alt="" src="images/zumba-image.jpg" srcset="images/zumba-image.jpg 1x, images/zumba-image_2x.jpg 2x" />
                </div>
                <div class="listing-content">
                	<div>
                        <h2><span class="facilities-content-icon"><img alt="" src="images/zumba-active-icon.png" srcset="images/zumba-active-icon.png 1x, images/zumba-active-icon_2x.png 2x" /></span><span>Zumba</span></h2>  
                        <p>
                            Zumba takes the “work” out of workout, by mixing lowintensity and high-intensity moves for an interval-style, calorie-burning 		
                            dance fitness party. Once the Latin and World rhythms take over, you’ll see why Zumba® Fitness classes are often 
                            called exercise in disguise. 
                        </p>
                        <p class="duration"><strong>Class Duration</strong>: 45 Minutes</p>
                    </div>
                    <div class="listing-bar">
                    	<ul>
                        	<li>Intensity <span>high & low</span></li>
                            <li>Improve <span>balance & flexibility</span></li>
                            <li>Fuel <span>cardio fitness</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="listing-row">
            	<div class="listing-image">
                	<img alt="" src="images/fbc-image.jpg" srcset="images/fbc-image.jpg 1x, images/fbc-image_2x.jpg 2x" />
                </div>
                <div class="listing-content">
                	<div>
                        <h2><span class="facilities-content-icon"><img alt="" src="images/fbs-active-icon.png" srcset="images/fbs-active-icon.png 1x, images/fbs-active-icon_2x.png 2x" /></span><span>FBC</span></h2>  
                        <p>
                            A low impact Fat Burning Class incorporating various aerobic moves and combinations. This great cardiovascular workout 
                            will get your heart rate up and get rid of those not-so-loved love handles.
                        </p>
                        <p class="duration"><strong>Class Duration</strong>: 45 Minutes</p>
                    </div>
                    <div class="listing-bar">
                    	<ul>
                        	<li>Intensity <span>low & impact</span></li>
                            <li>Fuel <span>cardio fitness</span></li>
                            <li>Improve <span>tone</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="listing-row">
            	<div class="listing-image">
                	<img alt="" src="images/pilates-2.jpg" srcset="images/pilates-2.jpg 1x, images/pilates-2_2x.jpg 2x" />
                </div>
                <div class="listing-content">
                	<div>
                        <h2><span class="facilities-content-icon"><img alt="" src="images/pilates-active-icon.png" srcset="images/pilates-active-icon.png 1x, images/pilates-active-icon_2x.png 2x" /></span><span>Pilates</span></h2>  
                        <p>
                            Pilates mat classes focus on your core strength and flexibility to improve coordination and body alignment. With correct 	
                            breathing and control of deeper muscles pilates promotes efficient movements with the focus on good posture and body 		
                            awareness.
                        </p>
                        <p class="duration"><strong>Class Duration</strong>: 45 Minutes</p>
                    </div>
                    <div class="listing-bar">
                    	<ul>
                        	<li>Improve <span>core strength</span></li>
                            <li>Increase <span>tone & muscle</span></li>
                            <li>Improve <span>body alignment</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="listing-row">
            	<div class="listing-image">
                	<img alt="" src="images/bootcamp-image.jpg" srcset="images/bootcamp-image.jpg 1x, images/bootcamp-image_2x.jpg 2x" />
                </div>
                <div class="listing-content">
                	<div>
                        <h2><span class="facilities-content-icon"><img alt="" src="images/bootcamp-active-icon.png" srcset="images/bootcamp-active-icon.png 1x, images/bootcamp-active-icon_2x.png 2x" /></span><span>Bootcamp</span></h2>  
                        <p>
                            These indoor/outdoor session will make you huff, puff and sweat while having fun at the same time. Utilising a range of 		
                            different equipment and environments, you will never get bored of this full-body conditioning class!
                        </p>
                        <p class="duration"><strong>Class Duration</strong>: 30 Minutes</p>
                    </div>
                    <div class="listing-bar">
                    	<ul>
                        	<li>Train <span>full body</span></li>
                            <li>Fuel <span>cardio fitness</span></li>
                            <li>Level <span>high intensity</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="listing-row">
            	<div class="listing-image">
                	<img alt="" src="images/strech-image.jpg" srcset="images/strech-image.jpg 1x, images/strech-image_2x.jpg 2x" />
                </div>
                <div class="listing-content">
                	<div>
                        <h2><span class="facilities-content-icon"><img alt="" src="images/strech-active-icon.png" srcset="images/strech-active-icon.png 1x, images/strech-active-icon_2x.png 2x" /></span><span>Stretch & Relaxation</span></h2>  
                        <p>
                            A slow type of yoga with a focus on breathing, stretching, flexibility and relaxation. You can use this stretching workout 
                            as a thorough cooldown, a rest day workout or a relaxing routine to do before winding down for sleep at night.
                        </p>
                        <p class="duration"><strong>Class Duration</strong>: 30 Minutes</p>
                    </div>
                    <div class="listing-bar">
                    	<ul>
                        	<li>Focus on <span>full body</span></li>
                            <li>Improve <span>flexibility</span></li>
                            <li>Level <span>low intensity</span></li>
                        </ul>
                    </div>
                </div>
            </div>
HTML;

		return $facilitiesHTML;

		}

	}

	function hendragym_CentireFacilities_instance() {
		global $centireFacilities;
		$centireFacilities = new CentireFacilities();

	}
	hendragym_CentireFacilities_instance();

}