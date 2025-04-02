/**
 * Toggle any area
 *
 * @param selector
 * @param dataSelectorSuffix
 * @param hiddenSymbol
 */
const toggle = (selector, dataSelectorSuffix, hiddenSymbol = '***************') => {
    $(document).on('click', selector, function() {
        let $this = $(this);
        let originalText = $this.attr('data-' + dataSelectorSuffix);

        if (!$this.data('initialized')) {
            $this.data('initialized', true);
            $this.text(hiddenSymbol);
        }

        $this.text($this.text() === hiddenSymbol ? originalText : hiddenSymbol);
    });
};
