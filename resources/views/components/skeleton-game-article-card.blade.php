<article class="uk-child-width-expand uk-grid-column-medium uk-grid-row-small uk-grid" uk-grid>
    <aside class="uk-width-1-3@m">
        <div class="uk-tile  uk-border-rounded article-skeleton-image bg-light-gray  "></div>
    </aside>
    <div class='uk-panel'>
        <span class="text-transparent bg-light-gray uk-h4 uk-margin-remove-top uk-margin-remove-bottom  uk-border-rounded  ">
            {{ str_repeat('_', rand(10, 30)) }}
        </span>
        <div class="text-transparent bg-light-gray uk-panel  uk-margin-small-top uk-border-rounded  ">
            {{ str_repeat('_<br/>', rand(10, 50)) }}
        </div>
    </div>
</article>
