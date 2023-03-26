(function(wp) {
  var el = wp.element.createElement;
  var registerBlockType = wp.blocks.registerBlockType;
  var TextControl = wp.components.TextControl;

  registerBlockType('exam-reaction-button/rection-button', {
    title: 'Reaction Button',
    icon: 'smiley',
    category: 'common',
    attributes: {
      text: {
        type: 'string',
        source: 'text',
        selector: 'p'
      }
    },
    edit: function(props) {
      var text = props.attributes.text;
      
      var block_heading = '<h2>Reaction Button</h2>';

      function onChangeTitle(newTitle) {
        props.setAttributes({ text: newTitle });
      }

      return el('div', { className: props.className },
        el(wp.element.RawHTML, {}, block_heading),  
        el(TextControl, {
          label: 'Title',
          value: text,
          onChange: onChangeTitle
        }),
      );
    },
    save: function(props) {
      var text = props.attributes.text;

      if( typeof text !== 'undefined' ) {
        var shortcode = '[reaction-button title="'+text+'"]';
      }else{
        var shortcode = '[reaction-button title="Share your exparience with us!!"]';
      }
      return el(wp.element.RawHTML, {}, shortcode);
    }
  });
})(window.wp);
