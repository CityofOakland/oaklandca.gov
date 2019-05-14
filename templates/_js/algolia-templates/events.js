var indexTemplate = 
`<article class="p-4 rounded flex-col border-celeste border h-full">
  {{#eventImageSrc}}
    <figure class="hidden rounded w-full h-24 sm:h-32 md:h-48 bg-white relative z-0 md:block">
      <img src="{{ eventImageSrc }}" class="rounded object-fit-cover absolute h-full w-full pin">
    </figure>
  {{/eventImageSrc}}
  {{^eventImageSrc}}
    <figure class="hidden rounded w-full h-24 sm:h-32 md:h-48 p-4 bg-celeste relative z-0 md:block text-camouflage-green fill-current p-12">
      <img src="/assets/img/icon-newspaper.svg" class="opacity-75 h-full mx-auto block">
    </figure>
  {{/eventImageSrc}}
  <div>
    <div class="text-base text-camouflage-green mb-4 md:mt-2">
      {{ displayDate }}
    </div>
    <h3 class="text-2xl sm:text-lg mt-4 mb-0 sm:mt-0 sm:mb-4">
      <a href="/{{ url }}">
        {{{_highlightResult.title.value}}}
      </a>
    </h3>
    <div class="text-shark sm:text-sm my-4 hidden sm:block">
      {{{ _snippetResult.body.value }}}
    </div>
    <div class="hidden sm:block">
      <a href="/{{ url }}">Read More »</a>
    </div>
  </div>
</article>`;