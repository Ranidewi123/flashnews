<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Article;
use App\Models\Category;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::insert([
            'user_id'       => User::all()->random()->id,
            'category_id'   => Category::all()->random()->id,
            'title'         => 'Judul '.Str::random(5).' '.Str::random(5),
            'description'   => '<p>Be sure to add <code>aria-expanded</code> to the control element. This attribute explicitly conveys the current state of the collapsible element tied to the control to screen readers and similar assistive technologies. If the collapsible element is closed by default, the attribute on the control element should have a value of <code>aria-expanded="false"</code>. If you’ve set the collapsible element to be open by default using the <code>show</code> class, set <code>aria-expanded="true"</code> on the control instead. The plugin will automatically toggle this attribute on the control based on whether or not the collapsible element has been opened or closed (via JavaScript, or because the user triggered another control element also tied to the same collapsible element). If the control element’s HTML element is not a button (e.g., an <code>&lt;a&gt;</code> or <code>&lt;div&gt;</code>), the attribute <code>role="button"</code> should be added to the element.</p><p>If your control element is targeting a single collapsible element – i.e. the <code>data-bs-target</code> attribute is pointing to an <code>id</code> selector – you should add the <code>aria-controls</code> attribute to the control element, containing the <code>id</code> of the collapsible element. Modern screen readers and similar assistive technologies make use of this attribute to provide users with additional shortcuts to navigate directly to the collapsible element itself.</p><p>Note that Bootstrap’s current implementation does not cover the various <em>optional</em> keyboard interactions described in the <a href="https://www.w3.org/TR/wai-aria-practices-1.1/#accordion">WAI-ARIA Authoring Practices 1.1 accordion pattern</a> - you will need to include these yourself with custom JavaScript.</p>',
            'image'         => Str::random(5)
        ]);
    }
}
