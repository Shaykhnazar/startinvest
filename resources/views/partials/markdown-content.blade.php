<div class="markdown-content prose max-w-none">
    {!! Str::markdown($content) !!}
</div>

<style>
    .markdown-content {
        max-width: 100%;
        overflow-wrap: break-word;
    }

    .markdown-content h1 {
        font-size: 2em;
        font-weight: bold;
        margin-top: 1em;
        margin-bottom: 0.5em;
    }

    .markdown-content h2 {
        font-size: 1.5em;
        font-weight: bold;
        margin-top: 1em;
        margin-bottom: 0.5em;
    }

    .markdown-content h3 {
        font-size: 1.17em;
        font-weight: bold;
        margin-top: 1em;
        margin-bottom: 0.5em;
    }

    .markdown-content p {
        margin-bottom: 1em;
        line-height: 1.6;
    }

    .markdown-content ul, .markdown-content ol {
        margin-left: 2em;
        margin-bottom: 1em;
    }

    .markdown-content ul {
        list-style-type: disc;
    }

    .markdown-content ol {
        list-style-type: decimal;
    }

    .markdown-content li {
        margin-bottom: 0.5em;
    }

    .markdown-content em {
        font-style: italic;
    }

    .markdown-content strong {
        font-weight: bold;
    }

    .markdown-content hr {
        margin: 2em 0;
        border: 0;
        border-top: 1px solid #eaeaea;
    }

    .markdown-content a {
        color: #3490dc;
        text-decoration: underline;
    }

    .markdown-content a:hover {
        color: #2779bd;
    }
</style>
