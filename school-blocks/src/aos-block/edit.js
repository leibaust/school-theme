import { __ } from "@wordpress/i18n";
import {
	useBlockProps,
	InnerBlocks,
	InspectorControls,
} from "@wordpress/block-editor";
import { PanelBody, SelectControl } from "@wordpress/components";
import "./editor.scss";

export default function Edit({ attributes, setAttributes }) {
	const { animation } = attributes;

	const blockProps = useBlockProps({
		className: "aos-wrapper",
		"data-aos": animation,
	});

	const animationOptions = [
		{ value: "fade-up", label: __("Fade Up", "school-theme") },
		{ value: "fade-down", label: __("Fade Down", "school-theme") },
		{ value: "fade-left", label: __("Fade Left", "school-theme") },
		{ value: "fade-right", label: __("Fade Right", "school-theme") },
		{ value: "zoom-in", label: __("Zoom In", "school-theme") },
		{ value: "zoom-out", label: __("Zoom Out", "school-theme") },
		{ value: "flip-up", label: __("Flip Up", "school-theme") },
		{ value: "flip-down", label: __("Flip Down", "school-theme") },
	];

	return (
		<>
			<InspectorControls>
				<PanelBody title={__("Animation Settings", "school-theme")}>
					<SelectControl
						label={__("Animation Type", "school-theme")}
						value={animation}
						options={animationOptions}
						onChange={(value) => setAttributes({ animation: value })}
					/>
				</PanelBody>
			</InspectorControls>

			<div {...blockProps}>
				<InnerBlocks />
			</div>
		</>
	);
}
