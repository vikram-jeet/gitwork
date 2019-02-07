<?php
use mp_timetable\plugin_core\classes\Core;

if( !class_exists('CentireTimeTable') ) {

	/**
	 * Class CentirePlans
	 *
	 * Theme core functions here
	 */
	class CentireTimeTable {


		function __construct() {

			add_shortcode( 'HHW_SHOW_PILATES_TIME', [ $this, 'pilatesTimeTable' ] );

		}

        public function pilatesTimeTable( $atts ) {

			$arWeekDays = array('monday','tuesday','wednesday','thursday','friday','saturday','sunday');



			// normalize attribute keys, lowercase
			$atts = array_change_key_case( (array) $atts, CASE_LOWER );

			// override default attributes with user attributes
			$parameter = shortcode_atts( [
				'event-id' => 862,
			], $atts );




			$eventPostObject = get_post( $parameter['event-id'] );


			if ( !$eventPostObject ) {
				return '';
			}

			$timeSlots = $this->get_time_table_by_event($eventPostObject);

			$weeksHTML = '';
			$active = 'active';
			$timeSlotBlocks = '';
			$hide = '';

			foreach ( $arWeekDays as $arWeekDay ) {

				$weekDay            = ucwords( $arWeekDay );
				$weekFirstCharacter = substr( $weekDay, 0, 1 );

				$weeksHTML     .= <<<HTML
<li class="tabs-timetable {$active}" ><a href="#{$arWeekDay}-content">
                	<span class="facilities-icon">{$weekFirstCharacter}</span>
                    <span class="facilities-name">{$weekDay}</span>
                </a></li>
HTML;

				if ( isset( $timeSlots[ $arWeekDay ] ) && $timeSlots[ $arWeekDay ] ) {

					$amCol = '';
					$pmCol = '';
					$amCounter = 0;
					$pmCounter = 0;

					foreach ( $timeSlots[ $arWeekDay ] as $timeSlot ) {

						$hour = date( 'H', strtotime( $timeSlot ) );
						$startTime = date( get_option( 'time_format' ), strtotime( $timeSlot ) );
						if ( $hour < 12 ) {

							$amCounter++;
							$amCol .= '<td>'.$startTime.'</td>';

						} else {

							$pmCounter++;
							$pmCol .= '<td>'.$startTime.'</td>';

						}
					}

					$diffTdNumber = $amCounter - $pmCounter;

					if($diffTdNumber > 0 ) {
						for($td = $diffTdNumber ; $td < 0 ; $td++) {
							$pmCol .= '<td class="empty"></td>';
						}

					} elseif( $diffTdNumber < 0 ) {
						for($td = 0 ; $td < $diffTdNumber ; $td++) {
							$amCol .= '<td class="empty"></td>';
						}
					}



					if ( $amCol || $pmCol ) {
						$timeSlotBlocks .= <<<HTML
  <div class="tab-content-timetable facilities-block {$active} {$hide}" id="{$arWeekDay}-content">
            	<table style="width:100%;" cellspacing="3">
                	<tr>
                    	<td>AM</td>
                        {$amCol}
                    </tr>
                    <tr>
                    	<td>PM</td>
                        {$pmCol}
                    </tr>
                </table>
            </div>
HTML;

					}

				} else {
					$timeSlotBlocks .= <<<HTML
  <div class="tab-content-timetable facilities-block {$active} {$hide}" id="{$arWeekDay}-content">
            	<table style="width:100%;" cellspacing="3">
                	<tr>
                    	<td><h2>Time slot is not available</h2></td>
                        
                    </tr>
                </table>
            </div>
HTML;
				}


				$active = '';
				$hide = 'hide';
			}

			$pilatesTimeTable = <<<HTML
<ul class="facilities clear">
            	{$weeksHTML}
            </ul>
            <div class="hhw-tab-content-container">
            {$timeSlotBlocks}
            </div>
HTML;

			return $pilatesTimeTable;

		}

		public function get_time_table_by_event($eventPostObject) {

			$events = Core::get_instance()->get_controller( 'events' )->get_all_event_by_post( $eventPostObject );

			$timeTable = [];

			foreach ( $events as $event ) {

				$timeTable[strtolower(get_the_title($event->column_id))][] = $event->event_start;

			}

			return $timeTable;
		}
	}

	function hendragym_CentireTimeTable_instance() {
		global $centireTimeTable;
		$centireTimeTable = new CentireTimeTable();

	}

	hendragym_CentireTimeTable_instance();

}