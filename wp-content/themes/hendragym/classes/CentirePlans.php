<?php

if( !class_exists('CentirePlans') ) {

	/**
	 * Class CentirePlans
	 *
	 * Theme core functions here
	 */
	class CentirePlans {


		private $plans;

		function __construct() {
			add_shortcode('HHW_SHOW_PLAN_BOXES',[ $this,'getPlansHTML' ]);

		}


		public function plans() {

			$this->plans = [
				'main'    => [
					'flexi'    => (object) [
						'title'                     => 'Flexi',
						'membership_cost'           => '24.95',
						'membership_term'           => '2 fortnightly payments',
						'total_membership_cost'     => '91.80',
						'notes_for_membership'      => 'No lock in contracts, 30 days notice to cancel, Enjoy full gym access*',
						'fixed_term'                => 'NO',
						'min_term'                  => '1 Month',
						'initital_deposit'          => 'YES',
						'initial_depost_amount'     => '59',
						'admin_fee'                 => '20',
						'billing_frequency'         => 'FORTNIGHTLY',
						'frequency_amount'          => '49.90',
						'payment_in_advance'        => 'YES',
						'payment_in_advance_amount' => '103.95'
					],
					'18-month' => (object) [
						'title'                     => '18 Month',
						'membership_cost'           => '17.95',
						'membership_term'           => '39 fortnightly payments',
						'total_membership_cost'     => '1400',
						'notes_for_membership'      => 'No lock in contracts, 30 days notice to cancel, Enjoy full gym access*',
						'fixed_term'                => 'YES',
						'min_term'                  => '18 Month',
						'initital_deposit'          => 'YES',
						'initial_depost_amount'     => '59',
						'admin_fee'                 => '20',
						'billing_frequency'         => 'FORTNIGHTLY',
						'frequency_amount'          => '35.90',
						'payment_in_advance'        => 'Yes',
						'payment_in_advance_amount' => '103.95',
						'affordable'                => 'MOST AFFORDABLE',
					],

					'12-month' => (object)[
						'title'                     => '12 Month',
						'membership_cost'           => '19.95',
						'membership_term'           => '26 fortnightly payments',
						'total_membership_cost'     => '1037',
						'notes_for_membership'      => 'No lock in contracts, 30 days notice to cancel, Enjoy full gym access*',
						'fixed_term'                => 'YES',
						'min_term'                  => '12 Month',
						'initital_deposit'          => 'YES',
						'initial_depost_amount'     => '59',
						'admin_fee'                 => '20',
						'billing_frequency'         => 'FORTNIGHTLY',
						'frequency_amount'          => '39.90',
						'payment_in_advance'        => 'YES',
						'payment_in_advance_amount' => '103.95'
					],


				],
				'pilates' => [
					'flexi'    => (object)[
						'title'                     => 'Flexi',
						'membership_cost'           => '45',
						'membership_term'           => '2 fortnightly payments',
						'total_membership_cost'     => '180',
						'notes_for_membership'      => 'No lock in contracts, 30 days notice to cancel, Enjoy full gym access*',
						'fixed_term'                => 'NO',
						'min_term'                  => '1 Month',
						'initital_deposit'          => 'YES',
						'initial_depost_amount'     => '59',
						'admin_fee'                 => '20',
						'billing_frequency'         => 'FORTNIGHTLY',
						'frequency_amount'          => '90',
						'payment_in_advance'        => 'YES',
						'payment_in_advance_amount' => '103.95'
					],

					'18-month' => (object)[
						'title'                     => '18 Month',
						'membership_cost'           => '30',
						'membership_term'           => '39 fortnightly payments',
						'total_membership_cost'     => '2340',
						'notes_for_membership'      => 'No lock in contracts, 30 days notice to cancel, Enjoy full gym access*',
						'fixed_term'                => 'YES',
						'min_term'                  => '18 Month',
						'initital_deposit'          => 'yes',
						'initial_depost_amount'     => '59',
						'admin_fee'                 => '20',
						'billing_frequency'         => 'FORTNIGHTLY',
						'frequency_amount'          => '60',
						'payment_in_advance'        => 'Yes',
						'payment_in_advance_amount' => '103.95',
						'affordable'                => 'MOST AFFORDABLE',

					],

					'12-month' => (object)[
						'title'                     => '12 Month',
						'membership_cost'           => '35',
						'membership_term'           => '26 fortnightly payments',
						'total_membership_cost'     => '1820',
						'notes_for_membership'      => 'No lock in contracts, 30 days notice to cancel, Enjoy full gym access*',
						'fixed_term'                => 'YES',
						'min_term'                  => '12 Month',
						'initital_deposit'          => 'YES',
						'initial_depost_amount'     => '59',
						'admin_fee'                 => '20',
						'billing_frequency'         => 'FORTNIGHTLY',
						'frequency_amount'          => '70',
						'payment_in_advance'        => 'YES',
						'payment_in_advance_amount' => '103.95'
					],
				],
				'student' => [
					'flexi'    => (object)[
						'title'                     => 'Flexi',
						'membership_cost'           => '22.95',
						'membership_term'           => '2 fortnightly payments',
						'total_membership_cost'     => '91.80',
						'notes_for_membership'      => 'No lock in contracts, 30 days notice to cancel, Enjoy full gym access*',
						'fixed_term'                => 'NO',
						'min_term'                  => '1 Month',
						'initital_deposit'          => 'YES',
						'initial_depost_amount'     => '59',
						'admin_fee'                 => '20',
						'billing_frequency'         => 'FORTNIGHTLY',
						'frequency_amount'          => '45.90',
						'payment_in_advance'        => 'YES',
						'payment_in_advance_amount' => ''
					],
					'18-month' => (object)[
						'membership_cost'           => '16.95',
						'membership_term'           => '39 fortnightly payments',
						'total_membership_cost'     => '1322',
						'notes_for_membership'      => 'No lock in contracts, 30 days notice to cancel, Enjoy full gym access*',
						'fixed_term'                => 'YES',
						'min_term'                  => '18 Month',
						'initital_deposit'          => 'yes',
						'initial_depost_amount'     => '59',
						'admin_fee'                 => '20',
						'billing_frequency'         => 'FORTNIGHTLY',
						'frequency_amount'          => '33.90',
						'payment_in_advance'        => 'Yes',
						'payment_in_advance_amount' => '',
						'affordable'                => 'MOST AFFORDABLE',
					],
					'12-month' => (object)[
						'title'                     => '12 Month',
						'membership_cost'           => '17.95',
						'membership_term'           => '26 fortnightly payments',
						'total_membership_cost'     => '933',
						'notes_for_membership'      => 'No lock in contracts, 30 days notice to cancel, Enjoy full gym access*',
						'fixed_term'                => 'YES',
						'min_term'                  => '12 Month',
						'initital_deposit'          => 'YES',
						'initial_depost_amount'     => '59',
						'admin_fee'                 => '20',
						'billing_frequency'         => 'FORTNIGHTLY',
						'frequency_amount'          => '35.90',
						'payment_in_advance'        => 'YES',
						'payment_in_advance_amount' => ''
					],

				],
			];

		}

		public function getPlansHTML( $planFor = 'pilates' ) {

			if( is_array( $planFor ) ) {
				$planFor = isset($planFor['planfor']) && $planFor['planfor'] ? $planFor['planfor'] : '';
			}



			$planHTML = '';

			$this->plans();

			$plans = $this->plans[ $planFor ];


			if ( $plans ) {
				foreach ( $plans as $plan ) {

					$affordableText = isset( $plan->affordable ) ? '<span>'.$plan->affordable.'</span>' : '';
					$membershipNotes = $plan->notes_for_membership;


					$membershipNotes = explode( ',', $membershipNotes );

					$notesHTML = '';
					if ( $membershipNotes ) {


						foreach ( $membershipNotes as $note ) {
							$notesHTML .= '<li>' . $note . '</li>';
						}

						if ( $notesHTML ) {
							$notesHTML = '<ul>' . $notesHTML . '</ul>';
						}
					}


					$planHTML .= <<<HTML
<div class="plan-col">
						<div class="plan-title"><h1>{$plan->title} {$affordableText}</h1></div>
						<div class="plan-center">
							<h3 class="plan-price"><span>\${$plan->membership_cost}</span><span class="per">per <span class="week">week</span></span></h3>
							{$notesHTML}
							<a href="#">join now</a>
						</div>
					</div>
HTML;

				}

				if ( $planHTML ) {

					$planHTML = <<<HTML
<div class="membership-plan-row">{$planHTML}</div>
HTML;

				}

				return $planHTML;

			}


		}
	}

	function hendragym_CentirePlans_instance() {
		global $centirePlans;
		$centirePlans = new CentirePlans();

	}
	hendragym_CentirePlans_instance();

}