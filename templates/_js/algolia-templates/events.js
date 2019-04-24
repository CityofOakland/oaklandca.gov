var indexTemplate = `<article class="sm:py-8 vertical-card border-celeste border-b-2 h-full">
{{#eventImageSrc}}
  <figure class="hidden w-full h-48 sm:h-64 bg-white relative z-0 sm:flex items-start justify-center">
    <img src="{{ eventImageSrc }}" class="object-fit-cover absolute h-full w-full pin">
  </figure>
{{/eventImageSrc}}
{{^eventImageSrc}}
  <figure class="hidden w-full h-48 sm:h-64 p-4 bg-celeste relative z-0 sm:flex items-center justify-center">
    <div class="text-camouflage-green opacity-75 fill-current h-full p-12">
      <img src="/assets/img/icon-newspaper.svg" class="h-full">
    </div>
  </figure>
{{/eventImageSrc}}
<div>
<div class="text-base text-camouflage-green mb-4 sm:mt-4">
  {{ displayDate }}
</div>
<h3 class="text-2xl mt-4 sm:mt-0">
  <a href="/{{ url }}">
    {{{_highlightResult.title.value}}}
  </a>
</h3>
<div class="text-shark my-4 hidden sm:block">
  {{{ _snippetResult.body.value }}}
</div>
<div class="hidden sm:block">
  <a href="/{{ url }}">Read More »</a>
</div>
</article>`;