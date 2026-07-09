import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const { year, title, description } = attributes;
	const blockProps = useBlockProps.save( { className: 'ds-timeline__item' } );

	return (
		<li { ...blockProps }>
			<div className="ds-timeline__marker" aria-hidden="true"></div>
			<div className="ds-timeline__content">
				<RichText.Content
					tagName="div"
					className="ds-timeline__year"
					value={ year }
				/>
				<RichText.Content
					tagName="h3"
					className="ds-h3 ds-timeline__title"
					value={ title }
				/>
				{ description && (
					<RichText.Content
						tagName="p"
						className="ds-timeline__description"
						value={ description }
					/>
				) }
			</div>
		</li>
	);
}
