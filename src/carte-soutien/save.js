import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save( { attributes } ) {
	const { tone, title, subtitle, description, ctaLabel, ctaUrl } = attributes;
	const blockProps = useBlockProps.save( {
		className: `ds-support-card ds-support-card--${ tone }`,
	} );

	return (
		<div { ...blockProps }>
			<div className="ds-support-card__color" aria-hidden="true"></div>
			<div className="ds-support-card__panel">
				<RichText.Content
					tagName="h3"
					className="ds-support-card__title"
					value={ title }
				/>
				{ subtitle && (
					<RichText.Content
						tagName="span"
						className="ds-support-card__subtitle"
						value={ subtitle }
					/>
				) }
				{ description && (
					<RichText.Content
						tagName="p"
						className="ds-support-card__description"
						value={ description }
					/>
				) }
				{ ctaLabel && (
					<a
						className="ds-button ds-button--pop-orange ds-support-card__cta"
						href={ ctaUrl }
					>
						<RichText.Content value={ ctaLabel } />
					</a>
				) }
			</div>
		</div>
	);
}
