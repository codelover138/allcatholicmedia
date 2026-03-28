<?php

namespace Database\Seeders\Themes\Catholic;

use Acm\Community\Models\CommunityGroup;
use Acm\Community\Models\CommunityPost;
use Botble\Member\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatholicCommunitySeeder extends Seeder
{
    public function run(): void
    {
        $members = Member::query()->get();
        if ($members->isEmpty()) {
            $this->command->warn('No members found — skipping community seeder.');
            return;
        }

        $memberIds = $members->pluck('id')->toArray();

        // ── Assign members to groups ────────────────────────────────────────
        $groups = CommunityGroup::query()->get();

        foreach ($groups as $group) {
            $existingMemberIds = DB::table('community_group_members')
                ->where('group_id', $group->id)
                ->pluck('member_id')
                ->toArray();

            // Add 3-5 random members who aren't already in the group
            $available = array_diff($memberIds, $existingMemberIds);
            $toAdd     = array_slice(
                $available,
                0,
                min(count($available), rand(3, 5))
            );

            foreach ($toAdd as $memberId) {
                DB::table('community_group_members')->insertOrIgnore([
                    'group_id'  => $group->id,
                    'member_id' => $memberId,
                    'role'      => 'member',
                    'joined_at' => now()->subDays(rand(1, 60))->format('Y-m-d H:i:s'),
                ]);
            }

            // Recalculate members_count
            $count = DB::table('community_group_members')->where('group_id', $group->id)->count();
            $group->update(['members_count' => $count]);
        }

        // ── Community feed posts ─────────────────────────────────────────────
        $posts = [
            [
                'content' => 'Just finished a beautiful Holy Hour at our parish adoration chapel. The peace that comes from time with Our Lord in the Blessed Sacrament is indescribable. I encourage everyone to find a nearby adoration chapel and try it if you haven\'t. ✝️',
            ],
            [
                'content' => 'Today\'s Gospel really struck me — "Come to me, all you who are weary and burdened, and I will give you rest." (Matthew 11:28) Sharing this with anyone who needs it today. You are not alone in your struggles.',
            ],
            [
                'content' => 'Reminder: the Feast of All Saints is coming up! Don\'t forget it\'s a Holy Day of Obligation. A perfect opportunity to honor the whole company of heaven and ask for their intercession. Which saint is your patronal feast day?',
            ],
            [
                'content' => 'Our parish just started a new men\'s group that meets early on Friday mornings for Mass, breakfast, and faith sharing. It\'s been running for three weeks and we already have 15 guys. If your parish doesn\'t have something like this — start it! The need is real.',
            ],
            [
                'content' => 'Reading through the Catechism of the Catholic Church for the first time (I know, I know — it should have been sooner!). The section on the Liturgy is absolutely stunning. Has anyone done a full read-through? Best way to do it — cover to cover or topic by topic?',
            ],
            [
                'content' => 'Asking for prayers for my mother who was just diagnosed with cancer. She is a woman of deep faith and faces this with incredible courage, but please lift her up to Our Lady of Lourdes and all the healing saints. Thank you, AllCatholicMedia community. 🙏',
            ],
            [
                'content' => 'Beautiful quote from St. Augustine I came across today in my morning reading: "Our heart is restless until it rests in You." After 20 years of searching, that describes my journey to the Church perfectly. If you\'re in the RCIA process, welcome home — it is worth everything.',
            ],
            [
                'content' => 'Pro-life tip: the 40 Days for Life campaign begins soon. Even one hour of peaceful, prayerful vigil outside an abortion clinic makes a difference — spiritually and practically. Many locations across the country. Find yours at 40daysforlife.com.',
            ],
            [
                'content' => 'Has anyone been watching the Vatican\'s streaming of papal audiences on YouTube? The quality has improved enormously and it\'s a beautiful way to feel connected to the universal Church when you can\'t be in Rome. Pope Francis speaks with such warmth.',
            ],
            [
                'content' => 'Family Rosary update: we\'ve been praying the family Rosary every evening for 30 days now. Some nights it\'s chaotic with young kids, some nights it\'s peaceful, but we have not missed a day. The grace of perseverance is real. Anyone else doing the family Rosary?',
            ],
            [
                'content' => 'The Divine Mercy Chaplet at 3pm today. Stopping to remember what hour it is and Who suffered for us at this hour is one of the most profound practices I know. "Eternal Father, I offer you the Body and Blood, Soul and Divinity of Your dearly beloved Son..."',
            ],
            [
                'content' => 'Book recommendation: "The Story of a Soul" by St. Thérèse of Lisieux. I\'ve read it three times and wept every time. Her "Little Way" — doing ordinary things with extraordinary love — is within reach of every one of us. Truly one of the greatest spiritual autobiographies ever written.',
            ],
        ];

        $postCount = 0;
        $idx       = 0;

        foreach ($posts as $postData) {
            // Skip duplicates
            if (CommunityPost::query()->where('content', $postData['content'])->exists()) {
                $idx++;
                continue;
            }

            $memberId = $memberIds[$idx % count($memberIds)];
            $idx++;

            CommunityPost::query()->create([
                'member_id'      => $memberId,
                'type'           => 'text',
                'content'        => $postData['content'],
                'likes_count'    => rand(2, 45),
                'comments_count' => rand(0, 12),
                'status'         => 'published',
            ]);

            $postCount++;
        }

        $this->command->info("Community seeded: {$postCount} feed posts, members assigned to groups.");
    }
}
