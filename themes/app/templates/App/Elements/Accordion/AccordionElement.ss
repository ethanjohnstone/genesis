<% loop $Items %>
    <div class="c-accordion-item" <% if $AnchorReference %>id="$AnchorReference" <% end_if %>>
        <button class="c-accordion-item__header">{$Title}</button>
        <div class="c-accordion-item__body" aria-hidden="true">
            {$Content}
        </div>
    </div>
<% end_loop %>