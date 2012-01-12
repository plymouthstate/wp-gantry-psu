<?php
/**
 * @version   1.17 August 15, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $gantry->language; ?>" lang="<?php echo $gantry->language;?>" >
<head>
	<?php
		$gantry->displayHead();
		$gantry->addStyles(array('template.css','wordpress.css','wp.css','style.css'));
	?>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
</head>
	<body <?php echo $gantry->displayBodyTag(); ?>>
		<div id="rt-header">
			<div class="rt-container">
				<div id="branding" class="rt-grid-5 rt-alpha">
					<h1><a href="/">Plymouth State University</a></h1>
				</div>
				<div id="quick-nav" class="rt-grid-11 rt-omega">
					<ul id="tool-nav">
						<li><a href="http://library.plymouth.edu">Library</a> |</li>
						<li><a href="/webapp/phonebook/">Directory &amp; Departments </a> |</li>
						<li><a href="/about-psu/site-index/">A-Z Site Index</a></li>
									</ul>
									<ul id="tool-nav-bot">
									<!--li><form action="/search/" class="formsearch" method="get" name="search"><select id="header-quick-links" name="quick-links">
			<option value="/">Quick Links</option></select-->
									
									<!-- Search Google -->

					<form action="/search/" class="formsearch" method="get" name="search">
						<input name="cx" type="hidden" value="005322158811873917109:eb5xtxv98mg"/>
						<input name="cof" type="hidden" value="FORID:11"/>
						<input name="uP_tparam" type="hidden" value="frm"/>
						<input name="frm" type="hidden" value="search"/>
						<label for="search-box">Search</label>
						<input type="search" maxlength="50" id="search-box" name="q" value="" placeholder="Enter search" />
						<input type="submit" id="submit-search" value="Search" />

					</form>
								</li>
					</ul><!-- /tool-nav -->
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div id="rt-showcase">
			<div class="rt-container">
				<?php
					// Check to see if the header image has been removed
					$header_image = get_header_image();
					if ( ! empty( $header_image ) ) :
						// The header image
						// Check if this is a post or page, if it has a thumbnail, and if it's a big one
						if ( is_singular() &&
								has_post_thumbnail( $post->ID ) &&
								( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( HEADER_IMAGE_WIDTH, HEADER_IMAGE_WIDTH ) ) ) &&
								$image[1] >= HEADER_IMAGE_WIDTH ) :
							// Houston, we have a new header image!
							echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
						else : ?>
						<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
					<?php endif; // end check for featured image or standard header ?>
				<?php endif; // end check for removed header image ?>
			</div>
		</div>
		<div id="rt-menu">
			<div class="rt-container">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/blank.gif" id="nav-bg"/>
				<?php include 'mega-menu.php'; ?>
			</div>
		</div>
		<?php /** Begin Main Top **/ if ($gantry->countModules('maintop')) : ?>
		<div id="rt-maintop">
			<div class="rt-container">
				<?php echo $gantry->displayModules('maintop','standard','standard'); ?>
				<div class="clear"></div>
			</div>
		</div>
		<?php /** End Main Top **/ endif; ?>
		<?php /** Begin Main Body **/ ?>
	    <?php echo $gantry->displayMainbody('mainbody','sidebar','standard','standard','standard','standard','standard'); ?>
		<?php /** End Main Body **/ ?>
		<?php /** Begin Main Bottom **/ if ($gantry->countModules('mainbottom')) : ?>
		<div id="rt-mainbottom">
			<div class="rt-container">
				<?php echo $gantry->displayModules('mainbottom','standard','standard'); ?>
				<div class="clear"></div>
			</div>
		</div>
		<?php /** End Main Bottom **/ endif; ?>
		<?php /** Begin Bottom **/ if ($gantry->countModules('bottom')) : ?>
		<div id="rt-bottom">
			<div class="rt-container">
				<?php echo $gantry->displayModules('bottom','standard','standard'); ?>
				<div class="clear"></div>
			</div>
		</div>
		<?php /** End Bottom **/ endif; ?>
		<div id="rt-footer">
			<div class="rt-container">
				<div id="widget-text-12" class="widget rt-grid-4 widget_text rt-alpha">
					<div class="widget-inner">
						<h2 class="widgettitle">Resources for:</h2>
							<div class="textwidget">
								<ul>
									<li><a href="/admissions">Future Students</a></li>
									<li><a href="/parent">Parents &amp; Families</a></li>
									<li><a href="/community">Community</a></li>
									<li><a href="/alumni">Alumni &amp; Friends</a></li>
								</ul>
							</div>
					</div>
				</div>
				<div id="widget-text-9" class="widget rt-grid-4 widget_text ">
					<div class="widget-inner">
						<h3 class="widgettitle"><a href="/diversity">Diversity</a></h3>
						<h3 class="widgettitle"><a href="/sustainability">Sustainability</a></3>
						<h3 class="widgettitle"><a href="/emergency">Emergency Information</a></h3>
						<h3 class="widgettitle"><a href="/office/human-resources/">Employment</a></h3>
						<h3 class="widgettitle"><a href="/news">News</a></h3>
						<h3 class="widgettitle"><a href="http://thisweek.blogs.plymouth.edu/">Events</a></h3>
						<h3 class="widgettitle"><a href="/contact">Contact</a></h3>
						<h3 class="widgettitle"><a href="https://go.plymouth.edu/my">myPlymouth</a></h3>
					</div>
					<div class="textwidget"></div>
				</div>
				<div id="widget-text-10" class="widget rt-grid-4 widget_text">
					<div class="widget-inner">
						<h3 class="widgettitle">Quick Links</h>
							<ul>
								<li>	
									<select class="jumpmenu" name="academics" onChange="location = this.options[this.selectedIndex].value;">
										<option value="#" selected="selected">Academic Departments</option>
										<option value="department/art/">Art</option>
										<option value="department/asc/">Atmospheric Sc./Chemistry</option>
										<option value="department/biology">Biological Sciences</option>
										<option value="busdept/">Business</option>
										<option value="busdept/">College of Business Administration</option>
										<option value="department/commstudies">Communication/Media</option>
										<option value="department/computer-science/">Comp. Science &amp; Tech.</option>
										<option value="/Frost">Continuing/Prof. Education</option>
										<option value="/graduate/counseling/">Counselor Ed./School Psych</option>
										<option value="department/cjustice">Criminal Justice</option>
										<option value="office/university-studies">Department of Univ. Studies</option>
										<option value="education/">Education</option>
										<option value="department/english">English</option>
										<option value="department/esp">Environmental Sc. &amp; Policy</option>
										<option value="/graduate">Graduate Studies</option>
										<option value="hhp/">Health &amp; Human Perf.</option>
										<option value="department/history-philosophy/">History &amp; Philosophy</option>
										<option value="department/humanities/">Humanities</option>
										<option value="department/language/">Languages &amp; Linguistics</option>
										<option value="department/math/">Mathematics</option>
										<option value="mtd/">Music, Theatre, Dance</option>
										<option value="department/nursing/">Nursing</option>
										<option value="psych/">Psychology</option>
										<option value="socsci/">Social Science</option>
										<option value="department/social-work/">Social Work</option>
										<option value="wmstudies/">Women's Studies</option>   
									</select>
								</li>
								<li>
									<select class="jumpmenu" name="departments" onChange="location = this.options[this.selectedIndex].value;">
										<option value="#" selected="selected">Departments &amp; Services</option>
										<option value="main/siteindex.html">Complete department list</option>
										<option value="/admit">Admissions</option>
										<option value="/alumni">Alumni Relations</option>
										<option target="_blank" value="http://www.plymouth.bkstr.com">Bookstore</option>
										<option value="/bursar">Bursar</option>
										<option value="/services/career/">Career Services</option>
										<option value="/commencement">Commencement 2011</option>
										<option value="/office/counseling">Counseling and Human Relations Center</option>
										<option value="https://ssb.plymouth.edu/psc1_ban7/pkg_course_query.p_start">Course Schedule</option>
										<option value="/office/registrar/files/2011/10/Spring-2012-Schedule-of-Classes-as-of-Oct-9-20111.pdf">Course Schedule (PDF)</option>
										<option value="/center-for-active-living-and-healthy-communities/">Ctr. for Active Living &amp; Healthy Communities</option>
										<option value="/cfe">Ctr. for the Environment</option>
										<option value="/center-for-rural-partnerships/">Ctr. for Rural Partnerships</option>
										<option value="/stulife">Dean of Students</option>
										<option value="/development">Development</option>
										<option value="/dining">Dining Services</option>
										<option value="/finaid">Financial Aid</option>
										<option value="/frost">Frost School</option>
										<option value="/office/global-education/">Global Education Office</option>
										<option value="/graduate">Graduate Studies</option>
										<option value="/hub">Hartman Union Building</option>
										<option value="/wellness">Health &amp; Wellness Center</option>
										<option value="/hr">Human Resources</option>
										<option value="/office/information-technology/">Information Technology</option>
										<option value="/services/internships/">Internships</option>
										<option value="/hub/orientation/">New Student Orientation</option>
										<option value="/online">Online Education</option>
										<option value="/fsb">Physical Plant</option>
										<option value="/office/public-relations">Public Relations</option>
										<option value="/recprograms">Recreation Programs</option>
										<option value="/registrar">Registrar</option>
										<option value="/reslife">Residential Life</option>
										<option value="/silver">Silver Center for the Arts</option>
										<option value="/office/student-account-services/">Student Account Services</option>
										<option value="/hub/sao">Student Activities</option>
										<option value="/services/study-abroad/">Study Abroad</option>
										<option value="/undergrad">Undergraduate Studies</option>
										<option value="/office/police/">University Police</option>
										<option value="http://vortex.plymouth.edu">Weather Center</option>
										<option value="/about-psu/webcam/">WebCam</option>
									</select>
								</li>
								<li>
									<select class="jumpmenu" name="majors" onChange="location = this.options[this.selectedIndex].value;">
										<option value="#" selected="selected">Majors</option>
										<option value="busdept/degrees.html">Accounting</option>
										<option value="department/hhp/adventure-education/overview">Adventure Education</option>
										<option value="socsci/programs/anthro.html">Anthropology/Sociology</option>
										<option value="artdept/degrees.html">Art</option>
										<option value="artdept/degrees.html">Art Education (K-12)</option>
										<option value="hhp/atraining/">Athletic Training</option>
										<option value="biology/degrees.html">Biology</option>
										<option value="biology/degrees.html">Biotechnology</option>
										<option value="busdept/degrees.html">Business Administration</option>
										<option value="ceaps/degrees.html">Chemistry</option>
										<option value="education/degrees.html">Childhood Studies</option>
										<option value="commstudies/degrees.html">Communication Studies</option>
										<option value="compsci/degrees.html">Computer Science</option>
										<option value="cjustice/degrees.html">Criminal Justice</option>
										<option value="education/degrees.html">Early Childhood Studies</option>
										<option value="department/english/degrees-options-minors/">English</option>
										<option value="biology/degrees.html">Environmental Biology</option>
										<option value="socsci/programs/eplanning.html">Environmental Planning</option>
										<option value="department/esp/degrees-options-minors/">Environmental Sc. &amp; Policy</option>
										<option value="busdept/degrees.html">Finance</option>
										<option value="artdept/degrees.html">Fine Arts</option>
										<option value="department/language/details/?code=FR&type=J&department_code=FL">French</option>
										<option value="socsci/programs/eplanning.html">Geography</option>
										<option value="hhp/health/">Health Education</option>
										<option value="/department/history-philosophy/details/?code=HI&type=I&department_code=SS">History</option>
										<option value="interdisc/degrees.html">Humanities</option>
										<option value="compsci/degrees.html">Information Technology</option>
										<option value="interdisc/degrees.html">Interdisciplinary Studies</option>
										<option value="busdept/degrees.html">Management</option>
										<option value="busdept/degrees.html">Marketing</option>
										<option value="math/degrees.html">Mathematics</option>
										<option value="ceaps/degrees.html">Meteorology</option>
										<option value="mtd/music/">Music</option>
										<option value="mtd/music/">Music Education</option>
										<option value="department/nursing/degrees-options-minors/">Nursing</option>
										<option value="department/history-philosophy/">Philosophy</option>
										<option value="hhp/physical">Physical Education</option>
										<option value="ceaps/degrees.html">Physical Science Education</option>
										<option value="socsci/programs/polisci.html">Political Science</option>
										<option value="psych/degrees.html">Psychology</option>
										<option value="socsci/programs/public.html">Public Management</option>
										<option value="socsci/programs/socsci.html">Social Science</option>
										<option value="socwork/catalog">Social Work</option>
										<option value="socsci/programs/anthro.html">Sociology/Anthropology</option>
										<option value="department/language/details/?code=SP&type=J&department_code=FL">Spanish</option>
										<option value="mtd/theatre/">Theatre Arts</option>  
										<option value="/socsci/programs/program.html?code=TM&amp;type=J&amp;department_code=SS">Tourism Mgmt &amp; Policy</option>
									</select>
								</li>
							</ul>
						</div>
					</div>
					<div id="widget-text-11" class="widget rt-grid-4 widget_text rt-omega">
						<div class="widget-inner">
							<h2 class="widgettitle">Stay Connected with PSU</h2>
							<div class="textwidget">
								<a href="https://www.facebook.com/PlymouthState"><img src="<?php echo $GLOBALS['PSU_OVERRIDE_TPL_DIR'] ? $GLOBALS['PSU_OVERRIDE_TPL_DIR']: get_bloginfo('template_directory'); ?>/images/ico_facebook.png" class="social" /></a>
								<a href="http://twitter.com/#!/plymouthstate"><img src="<?php echo $GLOBALS['PSU_OVERRIDE_TPL_DIR'] ? $GLOBALS['PSU_OVERRIDE_TPL_DIR']: get_bloginfo('template_directory'); ?>/images/ico_twitter.png" class="social" /></a>
								<!--img src="<?php echo $GLOBALS['PSU_OVERRIDE_TPL_DIR'] ? $GLOBALS['PSU_OVERRIDE_TPL_DIR'] : get_bloginfo('template_directory'); ?>/images/ico_flickr.png" class="social" />
								<img src="<?php echo $GLOBALS['PSU_OVERRIDE_TPL_DIR'] ? $GLOBALS['PSU_OVERRIDE_TPL_DIR'] : get_bloginfo('template_directory'); ?>/images/ico_linkedin.png" class="social" /-->
								<a href="http://images.plymouth.edu/"><img src="<?php echo $GLOBALS['PSU_OVERRIDE_TPL_DIR'] ? $GLOBALS['PSU_OVERRIDE_TPL_DIR']: get_bloginfo('template_directory'); ?>/images/ico_smug.png" class="social" /></a>
								<a href="<?php get_bloginfo('rss2_url'); ?>"><img src="<?php echo $GLOBALS['PSU_OVERRIDE_TPL_DIR'] ? $GLOBALS['PSU_OVERRIDE_TPL_DIR']: get_bloginfo('template_directory'); ?>/images/ico_rss.png" class="social" /></a>
							</div>
							<h2 class="widgettitle">Current Weather in Plymouth</h2>
							<div class="textwidget-weather"><p class="weather"><?php include_once '/web/pscpages/includes/weather_home.php';?></p></div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<?php /** Begin Copyright **/ if ($gantry->countModules('copyright')) : ?>
		<div id="rt-copyright">
			<div class="rt-container">
				Plymouth State University  17 High Street. Plymouth, New Hampshire 03264-1595. Main Switchboard: (603) 535-5000.<br/>
				A member of the University System of New Hampshire. &copy; <?php echo date('Y'); ?>. All rights Reserved.
				<div class="clear"></div>
			</div>
		</div>
		<?php /** End Copyright **/ endif; ?>
		<?php /** Begin Debug **/ if ($gantry->countModules('debug')) : ?>
		<div id="rt-debug">
			<?php echo $gantry->displayModules('debug','standard','standard'); ?>
			<div class="clear"></div>
		</div>
		<?php /** End Debug **/ endif; ?>
		<?php $gantry->displayFooter(); ?>
	</body>
</html>
<?php
$gantry->finalize();
