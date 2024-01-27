const codeBlocks = document.querySelectorAll('pre.wp-block-code code')
if (codeBlocks.length > 0) {
    const link = document.createElement('link')
    link.id = 'highlightcss'
    link.rel = 'stylesheet'
    link.href = '/assets/highlight/styles/vs2015.min.css'
    document.head.appendChild(link)

    const script = document.createElement('script')
    script.id = 'highlightjs'
    script.src = '/assets/highlight/highlight.min.js'
    document.body.appendChild(script)

    script.onload = function () {
        console.log(codeBlocks)
        codeBlocks.forEach((el) => hljs.highlightElement(el) )
    }
}