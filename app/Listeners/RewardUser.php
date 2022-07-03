<?php

namespace App\Listeners;

use App\Events\UserReferred;
use App\Models\ReferralLink;
use App\Models\ReferralProgram;
use App\Models\ReferralRelationship;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RewardUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserReferred  $event
     * @return void
     */
    public function handle(UserReferred $event)
    {
        $referral = ReferralLink::find($event->referralId);
        if (!is_null($referral)) {
            ReferralRelationship::create(['referral_link_id' => $referral->id, 'user_id' => $event->user->id, 'bounce' => 10]);

            // Example...
            if ($referral->program->name === 'Sign-up Bonus') {
                // User who was sharing link
                $provider = $referral->user;
                // User who used the link
                $user = $event->user;
            }
        }
    }
}
