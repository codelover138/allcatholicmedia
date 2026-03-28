<?php

namespace Database\Seeders\Themes\Catholic;

use Acm\Community\Models\ForumCategory;
use Acm\Community\Models\ForumReply;
use Acm\Community\Models\ForumTopic;
use Botble\Member\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CatholicForumSeeder extends Seeder
{
    public function run(): void
    {
        // Fix duplicate "Catholic Culture" category (id=7 is a duplicate of id=4)
        $dupCat = ForumCategory::find(7);
        if ($dupCat && $dupCat->name === 'Catholic Culture') {
            $dupCat->update(['name' => 'Catholic Life & Culture', 'slug' => 'catholic-life-culture']);
        }

        $memberIds = Member::query()->pluck('id')->toArray();
        if (empty($memberIds)) {
            $this->command->warn('No members found — skipping forum seeder.');
            return;
        }

        $catMap = ForumCategory::query()->pluck('id', 'name');

        $topics = [
            // Vatican & Pope (cat 1)
            [
                'category' => 'Vatican & Pope',
                'title'    => 'What do you think of Pope Francis\'s recent encyclical on ecology?',
                'content'  => 'Laudato Si\' and Laudate Deum have generated much discussion. I\'d love to hear what the community thinks about the theological foundations of Catholic environmentalism and how we should live it out in our daily lives.',
                'replies'  => [
                    'The encyclicals are beautiful in their theology of creation. The key insight for me is that care for the earth is an extension of care for the poor — the two issues are inseparable.',
                    'I appreciate the ecological message but think some of the specific policy prescriptions go beyond the Church\'s competence. The principles are solid; the applications require prudential judgment.',
                    'Laudato Si\' changed how I think about my daily choices — what I eat, how I commute, how I spend money. It\'s deeply practical once you engage with it seriously.',
                ],
            ],
            [
                'category' => 'Vatican & Pope',
                'title'    => 'Understanding papal infallibility — what it is and what it is not',
                'content'  => 'There\'s so much misunderstanding about papal infallibility, both from Catholics and from non-Catholics. Let\'s have a clear theological discussion. The First Vatican Council defined it very precisely. What are the conditions, and why is it actually invoked very rarely?',
                'replies'  => [
                    'Infallibility is defined as applying only when the Pope speaks ex cathedra — formally defining a matter of faith or morals for the universal Church with the explicit intention of binding the faithful. It has only been used twice since Vatican I: the Immaculate Conception (1854) and the Assumption (1950).',
                    'What many people miss is that ordinary papal teaching, even in encyclicals, is not infallible — but it still demands a "religious submission of intellect and will" from Catholics. That\'s a higher standard than mere silence, but lower than assent of faith.',
                ],
            ],

            // Prayer & Spirituality (cat 2)
            [
                'category' => 'Prayer & Spirituality',
                'title'    => 'Struggling with dryness in prayer — has anyone experienced this?',
                'content'  => 'I\'ve been a practicing Catholic for 15 years but lately my prayer life feels dry and empty. Mass feels routine, the Rosary feels like going through the motions. Is this spiritual dryness? How do the saints and spiritual directors address it?',
                'replies'  => [
                    'What you\'re describing sounds like what St. John of the Cross called the "dark night of the senses." It\'s actually a sign of spiritual growth — God is weaning you from consolations so you can love Him for Himself, not for the good feelings He gives.',
                    'I went through something similar. What helped me was lectio divina — slow, meditative reading of Scripture. Instead of trying to feel something, I just listened. It took months but the life slowly returned.',
                    'Talk to a spiritual director! This is exactly what they\'re for. A good director can help you discern whether this is spiritual aridity, depression, or something else entirely.',
                    'St. Teresa of Ávila writes extensively about this in The Interior Castle. She says perseverance through dryness is worth more to God than consoled prayer — it\'s a purer form of love.',
                ],
            ],
            [
                'category' => 'Prayer & Spirituality',
                'title'    => 'Best resources for learning Lectio Divina',
                'content'  => 'I\'ve heard a lot about Lectio Divina and want to start practicing it but I\'m not sure where to begin. Are there any books, apps, or guides that you\'d recommend for someone completely new to this form of prayer?',
                'replies'  => [
                    'The best introduction I know is "Lectio Divina: Renewing the Ancient Practice of Praying the Scriptures" by M. Basil Pennington. Short, clear, and practical.',
                    'The Pray as You Go app from the Jesuits is excellent — it guides you through a short lectio divina session each day using the daily Mass readings. Free and beautifully done.',
                    'Don\'t overthink it. The four movements are: Read (lectio), Reflect (meditatio), Respond (oratio), Rest (contemplatio). Start with 10 minutes and a single paragraph of the Gospels.',
                ],
            ],
            [
                'category' => 'Prayer & Spirituality',
                'title'    => 'Divine Mercy devotion: sharing testimonies and questions',
                'content'  => 'The Divine Mercy devotion given to St. Faustina has been a powerful force in my prayer life. I wanted to open a thread for people to share their experiences, ask questions, or discuss the theology behind this devotion. The Chaplet, the Image, the Feast — all are worth discussing.',
                'replies'  => [
                    'The 3 o\'clock hour prayer changed my life. I pray it every day now, even if just a brief moment. The promise attached to that hour is extraordinary.',
                    'A beautiful aspect of Divine Mercy is that it\'s not just a personal devotion — it\'s a theological affirmation that God\'s mercy is greater than any sin. St. John Paul II had a special devotion to it and canonized Sr. Faustina in 2000.',
                ],
            ],

            // Sacraments & Liturgy (cat 3)
            [
                'category' => 'Sacraments & Liturgy',
                'title'    => 'Preparing children for First Holy Communion — advice and experiences',
                'content'  => 'My daughter will make her First Communion next spring and I want to supplement what her parish CRE program offers. How have other parents approached this? What resources, practices, or conversations have been most helpful?',
                'replies'  => [
                    'We read "My Jesus and I" with our children — a beautifully illustrated children\'s book on the Eucharist. Also, we started taking them to Eucharistic Adoration early so they understood Communion and Adoration are the same Jesus.',
                    'The most important thing is taking your child to Mass consistently and explaining what\'s happening. Children absorb so much liturgically when we narrate it for them.',
                    'Bishop Barron has a wonderful children\'s catechism series. Also, having your daughter go to Confession before First Communion — even if the parish doesn\'t require it formally — prepares her heart beautifully.',
                ],
            ],
            [
                'category' => 'Sacraments & Liturgy',
                'title'    => 'How to find a good spiritual director — practical advice',
                'content'  => 'I know I need a spiritual director but I don\'t know how to find one or what to look for. My parish priest is wonderful but very busy. Is it acceptable to work with a spiritual director who is not a priest? How do I even start?',
                'replies'  => [
                    'Spiritual directors do not need to be priests — many excellent directors are laypeople or religious sisters with proper formation. What matters is their training, their own prayer life, and their faithfulness to Church teaching.',
                    'Ask your diocese — most have a list of trained spiritual directors. Also, monasteries and retreat centers often have directors available to the laity.',
                    'Start with a retreat. Many retreat centers build in time with a director as part of the experience. That way you can discern whether the relationship is a good fit before committing.',
                ],
            ],

            // Catholic Culture (cat 4)
            [
                'category' => 'Catholic Culture',
                'title'    => 'Catholic fiction recommendations — books that sustained your faith',
                'content'  => 'I\'ve been reading more Catholic fiction lately and it\'s been wonderful for my faith. Authors like Shusaku Endo, Graham Greene, Flannery O\'Connor, and Walker Percy write fiction that takes Catholicism seriously without being saccharine. What have you read and loved?',
                'replies'  => [
                    '"Silence" by Shusaku Endo is one of the most profound novels I\'ve ever read. It deals unflinchingly with apostasy and the silence of God in suffering. Deeply Catholic in the best sense.',
                    'Flannery O\'Connor is essential. Her short stories hit like a fist — grotesque and violent on the surface, but underneath there\'s the grace of God breaking through every page. "A Good Man Is Hard to Find" is a masterpiece.',
                    '"The Power and the Glory" by Graham Greene — the "whisky priest" is one of the most compelling characters in Catholic literature. An imperfect man who continues to administer the sacraments under persecution.',
                    'Don\'t overlook Walker Percy! "The Moviegoer" and "Love in the Ruins" are brilliant explorations of alienation and Catholic faith in modern America.',
                ],
            ],
            [
                'category' => 'Catholic Culture',
                'title'    => 'Sacred music in the parish — what\'s the ideal?',
                'content'  => 'The quality of sacred music varies enormously from parish to parish. What does the Church actually teach about music at Mass? And practically speaking, how can average parishes improve their music without enormous resources?',
                'replies'  => [
                    'The Church has clear teaching in Sacrosanctum Concilium and the document "Sing to the Lord." Gregorian chant has "pride of place" (article 116). The ideal is chant, polyphony, and other sacred music — not entertainment-style music.',
                    'Even a small schola of 4–6 trained singers can transform a parish\'s liturgical life. The key is not a big choir but a committed, well-formed group.',
                    'Our parish introduced one chanted psalm at every Mass. The congregation learned it over about six weeks. It was a manageable step that immediately improved the liturgical atmosphere.',
                ],
            ],

            // Apologetics (cat 5)
            [
                'category' => 'Apologetics',
                'title'    => 'How do you respond to the "the Church is just a human institution" objection?',
                'content'  => 'When I share my faith with non-Catholic friends and family, I often hear "the Church is just a human institution full of sinful people — why would I trust it?" How do you engage with this argument charitably and persuasively?',
                'replies'  => [
                    'I usually agree with the premise and then push further: yes, the Church is made of sinners — that\'s precisely the point. Christ founded it not for the righteous but for sinners. The Church doesn\'t claim to be perfect in its members, but in its doctrine and sacraments.',
                    'The historical argument is powerful: if the Church were merely human, how did it survive 2,000 years? Voltaire predicted it would collapse; Napoleon tried to destroy it. Every human institution that size and age has collapsed. The Church shouldn\'t exist by purely human logic.',
                    '"You might be right that the Church has sinful members — but has the Catholic Church ever formally taught that sin is good? Has it ever officially endorsed what it condemned before? The magisterium\'s faithfulness to moral truth through history is remarkable."',
                ],
            ],
            [
                'category' => 'Apologetics',
                'title'    => 'Resources for understanding the Real Presence — for myself and to share',
                'content'  => 'A recent survey found that most self-identified Catholics don\'t believe in the Real Presence of Christ in the Eucharist. I want to deepen my own understanding and also be equipped to share this teaching clearly. What resources have you found most helpful?',
                'replies'  => [
                    '"The Lamb\'s Supper" by Scott Hahn is the best popular-level treatment I know — it connects the Mass to the Book of Revelation in a way that makes the Eucharist\'s cosmic significance viscerally real.',
                    'Bishop Barron\'s Word on Fire has a lot of short videos on the Eucharist. Perfect for sharing on social media with Catholic friends who may be wavering.',
                    'Go back to John 6. Read it slowly, in context, noting how many disciples left after Jesus said "unless you eat my flesh and drink my blood." He didn\'t call them back and soften the language — He let them go. That\'s the most powerful argument.',
                ],
            ],

            // Catholic Life & Culture (cat 7 - renamed)
            [
                'category' => 'Catholic Life & Culture',
                'title'    => 'NFP — natural family planning experiences and questions',
                'content'  => 'My wife and I are engaged and taking a marriage prep course that touches on NFP. We have honest questions about how it works practically, what the different methods are, and how Catholic couples have integrated this into their marriage. Open discussion welcome.',
                'replies'  => [
                    'We\'ve been using the Creighton Model for eight years. It requires commitment to the learning curve but once you\'re fluent in it, it\'s genuinely empowering — especially since Creighton can also be used to diagnose and treat underlying health issues (NaProTechnology).',
                    'The Sympto-Thermal Method has a lot of research behind it. The Couple to Couple League offers excellent instruction. The key is doing a proper course — don\'t just use an app without training.',
                    'The hardest part is the abstinence during fertile times if you have a serious reason to postpone pregnancy. It requires communication, prayer, and mutual sacrifice. But many couples report that NFP actually strengthened their marriage by requiring ongoing communication.',
                ],
            ],
            [
                'category' => 'Catholic Family Life',
                'title'    => 'Raising Catholic children in a secular school environment',
                'content'  => 'My children attend public school and face constant pressure from peers and sometimes teachers that implicitly (and sometimes explicitly) contradicts Catholic values. How do other Catholic families handle this? We can\'t afford Catholic school.',
                'replies'  => [
                    'The home is the primary school of faith — always. What happens at your kitchen table, at family prayer, and in how you live your daily life matters far more than what happens in any school.',
                    'We make sure our kids can articulate why they believe what they believe. "Because Mom said so" doesn\'t hold up under peer pressure. "Because this is what human nature requires and the Church teaches why" is much more robust.',
                    'Find a good parish youth group or a Catholic homeschool co-op that your kids can participate in. Community with other Catholic young people is indispensable.',
                    'We do a 10-minute family faith conversation over dinner most evenings — just reading a short passage of the Catechism or a saint\'s life. Small and consistent beats intensive and sporadic.',
                ],
            ],
        ];

        $topicCount  = 0;
        $replyCount  = 0;
        $memberCount = count($memberIds);

        foreach ($topics as $topicData) {
            $categoryName = $topicData['category'];
            // Try exact match first, then partial
            $catId = $catMap->get($categoryName);
            if (!$catId) {
                $catId = ForumCategory::query()
                    ->where('name', 'like', '%' . $categoryName . '%')
                    ->value('id') ?? $catMap->first();
            }

            // Skip if topic already exists
            if (ForumTopic::query()->where('title', $topicData['title'])->exists()) {
                continue;
            }

            $memberId = $memberIds[array_rand($memberIds)];
            $baseSlug = Str::slug($topicData['title']);
            $slug     = $baseSlug . '-' . substr(md5($topicData['title']), 0, 6);

            $topic = ForumTopic::query()->create([
                'category_id'   => $catId,
                'member_id'     => $memberId,
                'title'         => $topicData['title'],
                'slug'          => $slug,
                'content'       => $topicData['content'],
                'status'        => 'published',
                'views'         => rand(20, 400),
                'replies_count' => 0,
                'is_pinned'     => false,
                'is_locked'     => false,
                'last_reply_at' => now()->subMinutes(rand(10, 7200)),
            ]);

            $topicCount++;

            // Add replies
            $replyList  = $topicData['replies'] ?? [];
            $replyIndex = 0;
            foreach ($replyList as $replyContent) {
                $replyMemberId = $memberIds[$replyIndex % $memberCount];
                $replyIndex++;

                ForumReply::query()->create([
                    'topic_id'  => $topic->id,
                    'member_id' => $replyMemberId,
                    'content'   => $replyContent,
                    'status'    => 'published',
                ]);

                $replyCount++;
            }

            // Update reply count and last_reply_at
            if (!empty($replyList)) {
                $topic->update([
                    'replies_count' => count($replyList),
                    'last_reply_at' => now()->subMinutes(rand(5, 60)),
                ]);
            }

            // Update forum category topic count
            ForumCategory::query()->where('id', $catId)->increment('topics_count');
        }

        $this->command->info("Forum seeded: {$topicCount} topics, {$replyCount} replies.");
    }
}
